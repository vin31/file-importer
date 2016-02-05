<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Controllers\Controller;
use App\Services\Contracts\FileServiceInterface;
use Illuminate\Support\Facades\Response;

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
     * @param FileServiceInterface $service The file service
     * @return void
     */
    public function refreshRecords(FileServiceInterface $service)
    {
    	info("Refreshing records..........");
    	
    	$service->refreshRecords();

    	info("Refreshing records completed.");
    }
    
    /**
     * Downloads the file
     * 
     * @param int $id The unique id of the record
     */
    public function download($id)
    {
    	$files = File::where('id',$id)->get();
    	file_put_contents($files[0]->file_name, $files[0]->img_data);
    	return Response::download($files[0]->file_name);
    	
    }
}
