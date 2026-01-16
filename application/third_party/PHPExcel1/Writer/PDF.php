<?php

/**
 *  PHPExcel1_Writer_PDF
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
class PHPExcel1_Writer_PDF implements PHPExcel1_Writer_IWriter
{

    /**
     * The wrapper for the requested PDF rendering engine
     *
     * @var PHPExcel1_Writer_PDF_Core
     */
    private $renderer = null;

    /**
     *  Instantiate a new renderer of the configured type within this container class
     *
     *  @param  PHPExcel1   $PHPExcel1         PHPExcel1 object
     *  @throws PHPExcel1_Writer_Exception    when PDF library is not configured
     */
    public function __construct(PHPExcel1 $PHPExcel1)
    {
        $pdfLibraryName = PHPExcel1_Settings::getPdfRendererName();
        if (is_null($pdfLibraryName)) {
            throw new PHPExcel1_Writer_Exception("PDF Rendering library has not been defined.");
        }

        $pdfLibraryPath = PHPExcel1_Settings::getPdfRendererPath();
        if (is_null($pdfLibraryName)) {
            throw new PHPExcel1_Writer_Exception("PDF Rendering library path has not been defined.");
        }
        $includePath = str_replace('\\', '/', get_include_path());
        $rendererPath = str_replace('\\', '/', $pdfLibraryPath);
        if (strpos($rendererPath, $includePath) === false) {
            set_include_path(get_include_path() . PATH_SEPARATOR . $pdfLibraryPath);
        }

        $rendererName = 'PHPExcel1_Writer_PDF_' . $pdfLibraryName;
        $this->renderer = new $rendererName($PHPExcel1);
    }


    /**
     *  Magic method to handle direct calls to the configured PDF renderer wrapper class.
     *
     *  @param   string   $name        Renderer library method name
     *  @param   mixed[]  $arguments   Array of arguments to pass to the renderer method
     *  @return  mixed    Returned data from the PDF renderer wrapper method
     */
    public function __call($name, $arguments)
    {
        if ($this->renderer === null) {
            throw new PHPExcel1_Writer_Exception("PDF Rendering library has not been defined.");
        }

        return call_user_func_array(array($this->renderer, $name), $arguments);
    }

    /**
     * {@inheritdoc}
     */
    public function save($pFilename = null)
    {
        $this->renderer->save($pFilename);
    }
}
