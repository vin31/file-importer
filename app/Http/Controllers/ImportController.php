<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;

class ImportController extends Controller
{
    /**
     * Displays the list of files
     * @return Response
     */
    public function summary()
    {
    	$mytime = Carbon::now();
    	
    	//retrieve data from file.file_importer table
    	$records = DB::select('SELECT * FROM file.file_importer');
    	
    	//commenting these - clean this up later
    	/*
    	$records = [
    			['url' => 'www.google.com', 'date' => $mytime->toDateTimeString()],
    			['url' => 'www.yahoo.com', 'date' => $mytime->toDateTimeString()]
    	];*/
    	 
    	return view('summary')->with('records', $records);
    }
}
