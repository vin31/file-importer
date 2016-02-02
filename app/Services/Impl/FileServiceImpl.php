<?php
namespace App\Services\Impl;

use App\Services\Contracts\FileService;
use App\Services\Impl\FileComparator;
use App\Url;
use App\File;

/**
 * Service class that manages the files wherein it updates the database whenever there are 
 * changes from the import file.
 *
 */
class FileServiceImpl implements FileService
{
	/*
	 * Uses a trait that handles the file comaparison logic
	 */
	use FileComparator;
	
	/**
	 * Refreshes the records whenever there are changes found in the import file.
	 * 
	 * {@inheritDoc}
	 * @see \App\Services\Contracts\FileService::refreshRecords()
	 */
	public function refreshRecords()
	{
		$urls = $this->getUrls();
		
		// iterate import urls
		foreach ($urls as $url)
		{
			$import_url = $url->url;
			
			// checks if file type is supported
			if ($this->isFileSupported($import_url))
			{

				// get the blob value of import file
				$blob = file_get_contents($import_url);
					
				// checks if url already exists in Files table
				if ($this->isUrlExists($import_url))
				{
					// compares the import file and the one saved in Files table
					if ($this->compareFiles($blob, $this->getBlobOfFile($import_url)) === false)
					{
						// updates the blob column in Files table if imported file is different
						$this->updateBlob($blob, $import_url);
					}
				} else
				{
					// inserts a record in Files table if import url is not found
					$this->insertFile($blob, $import_url);
				}
			} else
			{
				info($import_url.' url is not supported');
			}
		}
	}

	/**
	 * Retrieves an array of import urls saved in the URL table.
	 * 
	 * @return array
	 */
	private function getUrls(){
		$urls = Url::all();
		
		return $urls;
	}
	
	/**
	 * Checks if the import url already exists in File table.
	 * 
	 * @param string $url The import url
	 * @return boolean
	 */
	private function isUrlExists($url){
		$urls = File::where('import_url',$url)->get();
    	
    	return count($urls) > 0;
	}
	
	/**
	 * Retrieves the blob value from File table for a given import url.
	 * 
	 * @param string $url The import url
	 * @return blob
	 */
	private function getBlobOfFile($url){
		$files = File::where('import_url', $url)->get();
    	
    	return count($files) > 0 ? $files[0]->img_data : null;
	}
	
	/**
	 * Inserts a record to the File table.
	 * 
	 * @param blob $blob The blob value of the import file
	 * @param string $url The import url
	 * @return void
	 */
	private function insertFile($blob, $url){
		$file = new File;
		$file->file_name = $this->getFileName($import_url);
		$file->import_url = $import_url;
		$file->img_data = $blob;
		
		info('Saving '.$file->file_name.'...');
		$file->save();
		
		info('Saving ?', [$file->file_name]);
	}
	
	/**
	 * Updates the blob data in File table for a given import url.
	 * 
	 * @param blob $blob The blob value of the import file
	 * @param string $url The import url
	 * @return void
	 */
	private function updateBlob($blob, $import_url){
		$affected = File::where('import_url', $import_url)
		->update(['img_data' => $blob]);
		
		info($affected.' file/s updated');
	}
}