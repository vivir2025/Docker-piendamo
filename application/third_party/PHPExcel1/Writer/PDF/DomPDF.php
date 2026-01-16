<?php

/**  Require DomPDF library */
$pdfRendererClassFile = PHPExcel1_Settings::getPdfRendererPath() . '/dompdf_config.inc.php';
if (file_exists($pdfRendererClassFile)) {
    require_once $pdfRendererClassFile;
} else {
    throw new PHPExcel1_Writer_Exception('Unable to load PDF Rendering library');
}

/**
 *  PHPExcel1_Writer_PDF_DomPDF
 *
 *  Copyright (c) 2006 - 2015 PHPExcel1
 *
 *  This library is free software; you can redistribute it and/or
 *  modify it under the terms of the GNU Lesser General Public
 *  License as published by the Free Software Foundation; either
 *  version 2.1 of the License, or (at your option) any later version.
 *
 *  This library is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *  Lesser General Public License for more details.
 *
 *  You should have received a copy of the GNU Lesser General Public
 *  License along with this library; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 *  @category    PHPExcel1
 *  @package     PHPExcel1_Writer_PDF
 *  @copyright   Copyright (c) 2006 - 2015 PHPExcel1 (http://www.codeplex.com/PHPExcel1)
 *  @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 *  @version     ##VERSION##, ##DATE##
 */
class PHPExcel1_Writer_PDF_DomPDF extends PHPExcel1_Writer_PDF_Core implements PHPExcel1_Writer_IWriter
{
    /**
     *  Create a new PHPExcel1_Writer_PDF
     *
     *  @param   PHPExcel1    $PHPExcel1    PHPExcel1 object
     */
    public function __construct(PHPExcel1 $PHPExcel1)
    {
        parent::__construct($PHPExcel1);
    }

    /**
     *  Save PHPExcel1 to file
     *
     *  @param   string     $pFilename   Name of the file to save as
     *  @throws  PHPExcel1_Writer_Exception
     */
    public function save($pFilename = null)
    {
        $fileHandle = parent::prepareForSave($pFilename);

        //  Default PDF paper size
        $paperSize = 'LETTER';    //    Letter    (8.5 in. by 11 in.)

        //  Check for paper size and page orientation
        if (is_null($this->getSheetIndex())) {
            $orientation = ($this->PHPExcel1->getSheet(0)->getPageSetup()->getOrientation()
                == PHPExcel1_Worksheet_PageSetup::ORIENTATION_LANDSCAPE) ? 'L' : 'P';
            $printPaperSize = $this->PHPExcel1->getSheet(0)->getPageSetup()->getPaperSize();
            $printMargins = $this->PHPExcel1->getSheet(0)->getPageMargins();
        } else {
            $orientation = ($this->PHPExcel1->getSheet($this->getSheetIndex())->getPageSetup()->getOrientation()
                == PHPExcel1_Worksheet_PageSetup::ORIENTATION_LANDSCAPE) ? 'L' : 'P';
            $printPaperSize = $this->PHPExcel1->getSheet($this->getSheetIndex())->getPageSetup()->getPaperSize();
            $printMargins = $this->PHPExcel1->getSheet($this->getSheetIndex())->getPageMargins();
        }
        
        $orientation = ($orientation == 'L') ? 'landscape' : 'portrait';

        //  Override Page Orientation
        if (!is_null($this->getOrientation())) {
            $orientation = ($this->getOrientation() == PHPExcel1_Worksheet_PageSetup::ORIENTATION_DEFAULT)
                ? PHPExcel1_Worksheet_PageSetup::ORIENTATION_PORTRAIT
                : $this->getOrientation();
        }
        //  Override Paper Size
        if (!is_null($this->getPaperSize())) {
            $printPaperSize = $this->getPaperSize();
        }

        if (isset(self::$paperSizes[$printPaperSize])) {
            $paperSize = self::$paperSizes[$printPaperSize];
        }


        //  Create PDF
        $pdf = new DOMPDF();
        $pdf->set_paper(strtolower($paperSize), $orientation);

        $pdf->load_html(
            $this->generateHTMLHeader(false) .
            $this->generateSheetData() .
            $this->generateHTMLFooter()
        );
        $pdf->render();

        //  Write to file
        fwrite($fileHandle, $pdf->output());

        parent::restoreStateAfterSave($fileHandle);
    }
}
