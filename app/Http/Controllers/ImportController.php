<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\File;
use App\Services\Contracts\FileService;

class ImportController extends Controller
{
    public function getSummary()
    {
    	$files = File::all();
    	
    	return view('summary', ['files' => $files]);
    }
    
    public function refreshRecords(FileService $service)
    {
    	info("Refreshing records..........");
    
    	$service->refreshRecords();
    
    	info("Refreshing records completed.");
    }
}
