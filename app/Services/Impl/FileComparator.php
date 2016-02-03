<?php

namespace App\Services\Impl;

/**
 * Handles the comparison of two files. 
 * 
 */
trait FileComparator
{
	/**
	 * Returns the filename of the url.
	 * 
	 * @param string $url The import url
	 * @return string
	 */
	public function getFileName($url)
	{
		return pathinfo($url, PATHINFO_FILENAME).'.'.pathinfo($url, PATHINFO_EXTENSION);
	}
	
	/**
	 * Checks if the import file is currently supported.
	 * 
	 * @param string $url The import url
	 * @return boolean
	 */
	public function isFileSupported($url)
	{
		$filetypeArr = ['application/pdf','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','text/plain','text/csv'];
		
		$arrHeaders = get_headers($url, 1);
		
		return in_array($arrHeaders['Content-Type'], $filetypeArr);
	}
	
	/**
	 * Compares two BLOB type files.
	 * 
	 * @param blob $blob1 The blob of the first file
	 * @param blob $blob2 The blob of the second file
	 * @return boolean
	 */
	public function compareFiles($blob1, $blob2) 
	{
		return $blob1 === $blob2;
	}
}