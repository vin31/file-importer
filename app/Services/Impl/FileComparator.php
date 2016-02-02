<?php

namespace App\Services\Impl;

trait FileComparator
{
	
	public function getFileName($url)
	{
		return pathinfo($url, PATHINFO_FILENAME).'.'.pathinfo($url, PATHINFO_EXTENSION);
	}
	
	public function isFileSupported($url)
	{
		return $this->isCsvFile($url) || $this->isPdfFile($url) || $this->isTxtFile($url);
	}
	
	public function compareFiles($blob1, $blob2) 
	{
		return $blob1 === $blob2;
	}
	
	private function isCsvFile($url) 
	{
		return strcasecmp(pathinfo($url, PATHINFO_EXTENSION), 'csv') === 0;
	}
	
	private function isPdfFile($url)
	{
		return strcasecmp(pathinfo($url, PATHINFO_EXTENSION), 'pdf') === 0;
	}
	
	private function isTxtFile($url)
	{
		return strcasecmp(pathinfo($url, PATHINFO_EXTENSION), 'txt') === 0;
	}
	
}