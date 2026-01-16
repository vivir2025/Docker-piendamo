<?php

class PHPExcel1_Reader_Excel5_Style_Border
{
    protected static $map = array(
        0x00 => PHPExcel1_Style_Border::BORDER_NONE,
        0x01 => PHPExcel1_Style_Border::BORDER_THIN,
        0x02 => PHPExcel1_Style_Border::BORDER_MEDIUM,
        0x03 => PHPExcel1_Style_Border::BORDER_DASHED,
        0x04 => PHPExcel1_Style_Border::BORDER_DOTTED,
        0x05 => PHPExcel1_Style_Border::BORDER_THICK,
        0x06 => PHPExcel1_Style_Border::BORDER_DOUBLE,
        0x07 => PHPExcel1_Style_Border::BORDER_HAIR,
        0x08 => PHPExcel1_Style_Border::BORDER_MEDIUMDASHED,
        0x09 => PHPExcel1_Style_Border::BORDER_DASHDOT,
        0x0A => PHPExcel1_Style_Border::BORDER_MEDIUMDASHDOT,
        0x0B => PHPExcel1_Style_Border::BORDER_DASHDOTDOT,
        0x0C => PHPExcel1_Style_Border::BORDER_MEDIUMDASHDOTDOT,
        0x0D => PHPExcel1_Style_Border::BORDER_SLANTDASHDOT,
    );

    /**
     * Map border style
     * OpenOffice documentation: 2.5.11
     *
     * @param int $index
     * @return string
     */
    public static function lookup($index)
    {
        if (isset(self::$map[$index])) {
            return self::$map[$index];
        }
        return PHPExcel1_Style_Border::BORDER_NONE;
    }
}