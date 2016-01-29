<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\File;

class ImportController extends Controller
{
    /**
     * Displays the list of files
     * @return Response
     */
    public function summary()
    {
    	$files = File::all();
    	
    	return view('summary', ['files' => $files]);
    }
}
