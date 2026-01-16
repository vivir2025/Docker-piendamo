<?php

/**
 * PHPExcel1_RichText
 *
 * Copyright (c) 2006 - 2015 PHPExcel1
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel1
 * @package    PHPExcel1_RichText
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel1 (http://www.codeplex.com/PHPExcel1)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
class PHPExcel1_RichText implements PHPExcel1_IComparable
{
    /**
     * Rich text elements
     *
     * @var PHPExcel1_RichText_ITextElement[]
     */
    private $richTextElements;

    /**
     * Create a new PHPExcel1_RichText instance
     *
     * @param PHPExcel1_Cell $pCell
     * @throws PHPExcel1_Exception
     */
    public function __construct(PHPExcel1_Cell $pCell = null)
    {
        // Initialise variables
        $this->richTextElements = array();

        // Rich-Text string attached to cell?
        if ($pCell !== null) {
            // Add cell text and style
            if ($pCell->getValue() != "") {
                $objRun = new PHPExcel1_RichText_Run($pCell->getValue());
                $objRun->setFont(clone $pCell->getParent()->getStyle($pCell->getCoordinate())->getFont());
                $this->addText($objRun);
            }

            // Set parent value
            $pCell->setValueExplicit($this, PHPExcel1_Cell_DataType::TYPE_STRING);
        }
    }

    /**
     * Add text
     *
     * @param PHPExcel1_RichText_ITextElement $pText Rich text element
     * @throws PHPExcel1_Exception
     * @return PHPExcel1_RichText
     */
    public function addText(PHPExcel1_RichText_ITextElement $pText = null)
    {
        $this->richTextElements[] = $pText;
        return $this;
    }

    /**
     * Create text
     *
     * @param string $pText Text
     * @return PHPExcel1_RichText_TextElement
     * @throws PHPExcel1_Exception
     */
    public function createText($pText = '')
    {
        $objText = new PHPExcel1_RichText_TextElement($pText);
        $this->addText($objText);
        return $objText;
    }

    /**
     * Create text run
     *
     * @param string $pText Text
     * @return PHPExcel1_RichText_Run
     * @throws PHPExcel1_Exception
     */
    public function createTextRun($pText = '')
    {
        $objText = new PHPExcel1_RichText_Run($pText);
        $this->addText($objText);
        return $objText;
    }

    /**
     * Get plain text
     *
     * @return string
     */
    public function getPlainText()
    {
        // Return value
        $returnValue = '';

        // Loop through all PHPExcel1_RichText_ITextElement
        foreach ($this->richTextElements as $text) {
            $returnValue .= $text->getText();
        }

        // Return
        return $returnValue;
    }

    /**
     * Convert to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getPlainText();
    }

    /**
     * Get Rich Text elements
     *
     * @return PHPExcel1_RichText_ITextElement[]
     */
    public function getRichTextElements()
    {
        return $this->richTextElements;
    }

    /**
     * Set Rich Text elements
     *
     * @param PHPExcel1_RichText_ITextElement[] $pElements Array of elements
     * @throws PHPExcel1_Exception
     * @return PHPExcel1_RichText
     */
    public function setRichTextElements($pElements = null)
    {
        if (is_array($pElements)) {
            $this->richTextElements = $pElements;
        } else {
            throw new PHPExcel1_Exception("Invalid PHPExcel1_RichText_ITextElement[] array passed.");
        }
        return $this;
    }

    /**
     * Get hash code
     *
     * @return string    Hash code
     */
    public function getHashCode()
    {
        $hashElements = '';
        foreach ($this->richTextElements as $element) {
            $hashElements .= $element->getHashCode();
        }

        return md5(
            $hashElements .
            __CLASS__
        );
    }

    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
        $vars = get_object_vars($this);
        foreach ($vars as $key => $value) {
            if (is_object($value)) {
                $this->$key = clone $value;
            } else {
                $this->$key = $value;
            }
        }
    }
}
