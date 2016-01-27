<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ImportController extends Controller
{
    /**
     * Displays the list of files
     * @return Response
     */
    public function summary()
    {
    	$mytime = Carbon::now();
    	 
    	$records = [
    			['url' => 'www.google.com', 'date' => $mytime->toDateTimeString()],
    			['url' => 'www.yahoo.com', 'date' => $mytime->toDateTimeString()]
    	];
    	 
    	return view('summary')->with('records', $records);
    }
}
