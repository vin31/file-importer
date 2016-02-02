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
		return $this->isCsvFile($url) || $this->isPdfFile($url) || $this->isTxtFile($url);
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
	
	/**
	 * Checks if the import url is CSV type.
	 * 
	 * @param string $url The import url
	 * @return boolean
	 */
	private function isCsvFile($url) 
	{
		return strcasecmp(pathinfo($url, PATHINFO_EXTENSION), 'csv') === 0;
	}
	
	/**
	 * Checks if the import url is PDF type.
	 *
	 * @param string $url The import url
	 * @return boolean
	 */
	private function isPdfFile($url)
	{
		return strcasecmp(pathinfo($url, PATHINFO_EXTENSION), 'pdf') === 0;
	}
	
	/**
	 * Checks if the import url is TXT type.
	 *
	 * @param string $url The import url
	 * @return boolean
	 */
	private function isTxtFile($url)
	{
		return strcasecmp(pathinfo($url, PATHINFO_EXTENSION), 'txt') === 0;
	}
}