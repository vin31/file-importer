<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use SplFileObject;
use Carbon\Carbon;

class ImportController extends Controller
{
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
