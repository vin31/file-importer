<?php
namespace App\Services\Impl;

use App\Services\Contracts\FileService;
use App\Services\Impl\FileComparator;
use App\Url;
use DB;
use App\File;
use Carbon;

class FileServiceImpl implements FileService
{

	use FileComparator; // Is using Trait here good?
	
	public $i = 1;
	
	const ID_COL = "id";
	
	const FILE_NAME_COL = "file_name";
	
	const DATE_ADDED_COL = "date_added";
	
	const DATE_UPDATED_COL = "date_updated";
	
	const IMG_DATA_COL = "img_data";
	
	const IMPORT_URL_COL = "import_url";
	
	const ACTIVE_COL = "active";
	
	public function refreshRecords()
	{

		$urls = $this->getUrls();
		
		foreach ($urls as $url)
		{
			$import_url = $url->url;
			
			$blob1 = file_get_contents($import_url);
			
			if ($this->isUrlExists($import_url))
			{
				if ($this->isCsvFile($import_url))
				{
					if ($this->compareCsvFiles($blob1,  $this->getBlobOfFile($import_url)) === false)
					{
						$affected = DB::update('UPDATE  SET '.SELF::IMG_DATA_COL.' = ?, '.SELF::DATE_UPDATED_COL. ' = ? WHERE '. SELF::IMPORT_URL_COL .' = ?', [$blob1, Carbon\Carbon::now(), $import_url]);
						info('? File/s updated', [$affected]);
					} 
				}
				else if ($this->isPdfFile($import_url)) 
				{
					if ($this->comparePdfFiles($blob1,  $this->getBlobOfFile($import_url)) === false)
					{
						$affected = DB::update('UPDATE  SET '.SELF::IMG_DATA_COL.' = ?, '.SELF::DATE_UPDATED_COL. ' = ? WHERE '. SELF::IMPORT_URL_COL .' = ?', [$blob1, Carbon\Carbon::now(), $import_url]);
						info('? File/s updated', [$affected]);
					}
				}
			} else 
			{
				$this->insertFile($blob1, $import_url);
			}
		}

	}

	private function getUrls(){
		$urls = Url::all();
		echo count($urls);
		return $urls;
	}
	
	private function isUrlExists($url){
		$urls = DB::select('SELECT '.SELF::IMPORT_URL_COL.' FROM homestead.files WHERE '.SELF::IMPORT_URL_COL.' = ?', [$url]);
		return count($urls) > 0;
	}
	
	private function getBlobOfFile($url){
		 
		$blobs = DB::select('SELECT ' .SELF::IMG_DATA_COL. ' FROM homestead.files WHERE '.SELF::IMPORT_URL_COL.' = \'' .$url.'\'');
		 
		return count($blobs) > 0 ? $blobs[0]->img_data : null;
	}
	
	private function insertFile($blob, $import_url){
		 
		$file = new File;
		 
		$file->file_name = $this->getFileName($import_url);
		$file->import_url = $import_url;
		$file->img_data = $blob;
		$file->save();
		 
		//     	$file->setFileName($this->getFileName($import_url));
		//     	$file->setDateAdded(Carbon\Carbon::now());
		//     	$file->setDateUpdated(Carbon\Carbon::now());
		//     	$file->setImageData($blob);
		//     	$file->setImportUrl($import_url);
		//     	$file->setActive('Y');
		 
		//     	DB::insert('INSERT into  ('.SELF::ID_COL.', '.SELF::FILE_NAME_COL.','.SELF::DATE_ADDED_COL.','.SELF::DATE_UPDATED_COL.','.SELF::IMG_DATA_COL.','.SELF::IMPORT_URL_COL.','.SELF::ACTIVE_COL.') VALUES (?, ?, ?, ?, ?, ?, ?)',[$this->i++, $file->getFileName(),$file->getDateAdded(),$file->getDateUpdated(),$file->getImageData(),$file->getImportUrl(),$file->getActive()]);
	}
}