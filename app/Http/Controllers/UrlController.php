<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use App\File;
use Carbon;

class UrlController extends Controller
{
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
			$import_url = $url->import_url;
			
			$blob = fopen($import_url,'rb');
			
			if ($this->isUrlExists($import_url))
			{
				$this->getBlobOfFile($import_url);
			} else 
			{
				$file = new File();
				$file->setFileName('sample.csv');
				$file->setDateAdded(Carbon\Carbon::now());
				$file->setDateUpdated(Carbon\Carbon::now());
				$file->setImageData($blob);
				$file->setImportUrl($import_url);
				$file->setActive('Y');
				
				$this->insertFile($file);
			}
			fclose($blob);
		}
		
// 		file_put_contents("sample.csv", fopen($url, 'rb'));
			 
	}
	
    public function getUrls(){
    	$urls = DB::select('SELECT '.SELF::IMPORT_URL_COL.' FROM file.import');
	    //return array of urls ($urls). for now, echo out import urls just to check.
		return $urls;
    }
    
    public function isUrlExists($url){
    	$urls = DB::select('SELECT '.SELF::IMPORT_URL_COL.' FROM file.file_importer WHERE '.SELF::IMPORT_URL_COL.' = ?', [$url]);
    	return count($urls) > 0;
    }
    
    public function getBlobOfFile($url='http://samplecsvs.s3.amazonaws.com/SalesJan2009.csv'){
    	
    	$blobs = DB::select('SELECT ' .SELF::IMG_DATA_COL. ' FROM file.file_importer WHERE '.SELF::IMPORT_URL_COL.' = \'' .$url.'\'');
    	
    	return count($blobs) > 0 ? $blobs[0]->img_data : null;
    }
    
    public function insertFile($file){
    	DB::insert('INSERT into file.file_importer ('.SELF::ID_COL.', '.SELF::FILE_NAME_COL.','.SELF::DATE_ADDED_COL.','.SELF::DATE_UPDATED_COL.','.SELF::IMG_DATA_COL.','.SELF::IMPORT_URL_COL.','.SELF::ACTIVE_COL.') VALUES (?, ?, ?, ?, ?, ?, ?)',[$this->i++, $file->getFileName(),$file->getDateAdded(),$file->getDateUpdated(),$file->getImageData(),$file->getImportUrl(),$file->getActive()]);
    }
}
