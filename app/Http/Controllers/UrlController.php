<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Contracts\FileService;

class UrlController extends Controller
{
	public function refreshRecords(FileService $service)
	{
		info("Refreshing records..........");
		
		$service->refreshRecords();
		
		info("Refreshing records completed.");
	}
}
