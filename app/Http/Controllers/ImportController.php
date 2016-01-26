<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use SplFileObject;
use Carbon\Carbon;

class ImportController extends Controller
{
	public function compareCsvFiles() {
    	
		$file1 = new SplFileObject("test.csv");
		$file1->setFlags(SplFileObject::READ_CSV);
		
		$file2 = new SplFileObject("test2.csv");
		$file2->setFlags(SplFileObject::READ_CSV);
		
		foreach ($file1 as $row) {
		    $csv_1[] = $row;
		}
		
		foreach ($file2 as $row) {
		    $csv_2[] = $row;
		}
		
		if ($csv_1 === $csv_2) {
			echo "true!";
		} else {
			echo "false!";
		}
			
    	return view('main');
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
		//echo phpinfo();
		
		return view('main');
    }
    
    /**
     * Handles the updating and displaying of files in the grid.
     * @return Response
     */
    public function summary()
    {
    	 
    	$mytime = Carbon::now();
    	echo $mytime->toDateTimeString();
    	 
    	$records = [
    			['url' => 'www.google.com', 'date' => $mytime->toDateTimeString()],
    			['url' => 'www.yahoo.com', 'date' => $mytime->toDateTimeString()]
    	];
    	 
    	$url = "http://samplecsvs.s3.amazonaws.com/SalesJan2009.csv";
    	file_put_contents("sample.csv", fopen($url, 'r'));
    	info("file 1 successfully downloaded");
    	 
    	$url = "http://samplecsvs.s3.amazonaws.com/SalesJan2009.csv";
    	file_put_contents("sample.csv", fopen($url, 'r'));
    	info("file 2 successfully downloaded");
    	 
    	return view('summary')->with('records', $records);
    }
    
    public function blobbify() {
    	$blob = fopen("test.csv",'rb');
    	print_r($blob);
    }

}
