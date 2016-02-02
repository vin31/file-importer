<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\File;
use App\Services\Contracts\FileService;

/**
 * Controller class that handles the display and saving of import files.
 *
 */
class ImportController extends Controller
{
	/**
	 * Retrieves all files from Files table.
	 * 
	 * @return array
	 */
    public function getSummary()
    {
    	$files = File::all();
    	
    	return view('summary', ['files' => $files]);
    }
    
    /**
     * Refreshes the Files table
     * 
     * @param FileService $service The file service
     * @return void
     */
    public function refreshRecords(FileService $service)
    {
    	info("Refreshing records..........");
    
    	$service->refreshRecords();
    
    	info("Refreshing records completed.");
    }
}
