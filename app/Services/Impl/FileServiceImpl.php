<?php
namespace App\Services\Impl;

use App\Services\Contracts\FileService;
use App\Services\Impl\FileComparator;
use App\Url;
use App\File;

class FileServiceImpl implements FileService
{

	use FileComparator; // Is using Trait here good?
	
	public function refreshRecords()
	{
		$urls = $this->getUrls();
		
		foreach ($urls as $url)
		{
			$import_url = $url->url;
			$blob = file_get_contents($import_url);
			
			if ($this->isUrlExists($import_url))
			{
				if ($this->isCsvFile($import_url))
				{
					if ($this->compareCsvFiles($blob,  $this->getBlobOfFile($import_url)) === false)
					{
						$this->updateBlob($blob, $import_url);
					} 
				}
				else if ($this->isPdfFile($import_url)) 
				{
					if ($this->comparePdfFiles($blob,  $this->getBlobOfFile($import_url)) === false)
					{
						$this->updateBlob($blob, $import_url);
					}
				}
			} else 
			{
				$this->insertFile($blob, $import_url);
			}
		}

	}

	private function getUrls(){
		$urls = Url::all();
		
		return $urls;
	}
	
	private function isUrlExists($url){
		$urls = File::where('import_url',$url)->get();
    	
    	return count($urls) > 0;
	}
	
	private function getBlobOfFile($url){
		$files = File::where('import_url', $url)->get();
    	
    	return count($files) > 0 ? $files[0]->img_data : null;
	}
	
	private function insertFile($blob, $import_url){
		$file = new File;
		$file->file_name = $this->getFileName($import_url);
		$file->import_url = $import_url;
		$file->img_data = $blob;
		$file->save();
	}
	
	private function updateBlob($blob, $import_url){
		$affected = File::where('import_url', $import_url)
		->update(['img_data' => $blob]);
		
		info('? File/s updated', [$affected]);
	}
}