<?php

/**
 * PHPExcel11_CachedObjectStorage_ICache
 *
 * Copyright (c) 2006 - 2015 PHPExcel11
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
 * @category   PHPExcel11
 * @package    PHPExcel11_CachedObjectStorage
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel11 (http://www.codeplex.com/PHPExcel11)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
interface PHPExcel11_CachedObjectStorage_ICache
{
    /**
     * Add or Update a cell in cache identified by coordinate address
     *
     * @param    string            $pCoord        Coordinate address of the cell to update
     * @param    PHPExcel11_Cell    $cell        Cell to update
     * @return    PHPExcel11_Cell
     * @throws    PHPExcel11_Exception
     */
    public function addCacheData($pCoord, PHPExcel11_Cell $cell);

    /**
     * Add or Update a cell in cache
     *
     * @param    PHPExcel11_Cell    $cell        Cell to update
     * @return    PHPExcel11_Cell
     * @throws    PHPExcel11_Exception
     */
    public function updateCacheData(PHPExcel11_Cell $cell);

    /**
     * Fetch a cell from cache identified by coordinate address
     *
     * @param    string            $pCoord        Coordinate address of the cell to retrieve
     * @return PHPExcel11_Cell     Cell that was found, or null if not found
     * @throws    PHPExcel11_Exception
     */
    public function getCacheData($pCoord);

    /**
     * Delete a cell in cache identified by coordinate address
     *
     * @param    string            $pCoord        Coordinate address of the cell to delete
     * @throws    PHPExcel11_Exception
     */
    public function deleteCacheData($pCoord);

    /**
     * Is a value set in the current PHPExcel11_CachedObjectStorage_ICache for an indexed cell?
     *
     * @param    string        $pCoord        Coordinate address of the cell to check
     * @return    boolean
     */
    public function isDataSet($pCoord);

    /**
     * Get a list of all cell addresses currently held in cache
     *
     * @return    string[]
     */
    public function getCellList();

    /**
     * Get the list of all cell addresses currently held in cache sorted by column and row
     *
     * @return    string[]
     */
    public function getSortedCellList();

    /**
     * Clone the cell collection
     *
     * @param    PHPExcel11_Worksheet    $parent        The new worksheet
     * @return    void
     */
    public function copyCellCollection(PHPExcel11_Worksheet $parent);

    /**
     * Identify whether the caching method is currently available
     * Some methods are dependent on the availability of certain extensions being enabled in the PHP build
     *
     * @return    boolean
     */
    public static function cacheMethodIsAvailable();
}
