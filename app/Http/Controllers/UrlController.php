<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class UrlController extends Controller
{
	const IMPORT_URL_COL = "import_url";
	
    public function getUrls(){
    	$urls = DB::select('SELECT '.SELF::IMPORT_URL_COL.' FROM file.import');
	    //return array of urls ($urls). for now, echo out import urls just to check.
	    foreach ($urls as $url) {
		    echo $url->import_url;
		}
    }
}
