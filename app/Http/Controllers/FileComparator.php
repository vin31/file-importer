<?php

namespace App\Http\Controllers;

use SplFileObject;

trait FileComparator
{
	public function compareCsvFiles($blob1, $blob2) {
		
		info('Comparing CSV files.....');
		
		file_put_contents('file1.csv', $blob1);
		file_put_contents('file2.csv', $blob2);
		
		$file1 = new SplFileObject("file1.csv");
		$file1->setFlags(SplFileObject::READ_CSV);
		
		$file2 = new SplFileObject("file2.csv");
		$file2->setFlags(SplFileObject::READ_CSV);
	
		foreach ($file1 as $row) {
			$csv_1[] = $row;
		}
	
		foreach ($file2 as $row) {
			$csv_2[] = $row;
		}
	
		if ($csv_1 === $csv_2) {
			return true;
		} else {
			return false;
		}
	}
	
	public function comparePdfFiles() {
		 
		$file = file_get_contents("pdf-sample.pdf");
		$file2 = file_get_contents("pdf-sample2.pdf");
	
		$string_array = str_split($file);
		$string_array2 = str_split($file2);
	
		$byteArr = array();
		$byteArr2 = array();
		foreach ($string_array as $key=>$val) {
			$byteArr[$key] = ord($val);
		}
	
		foreach ($string_array2 as $key2=>$val2) {
			$byteArr2[$key2] = ord($val2);
		}
	
		if ($byteArr === $byteArr2) {
			echo "true!";
		} else {
			echo "false!";
		}
	
		return view('main');
	}
	
	public function isCsvFile($url) 
	{
		return strcasecmp(pathinfo($url, PATHINFO_EXTENSION), 'csv') === 0;
	}
}