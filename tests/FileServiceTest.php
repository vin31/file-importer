<?php
use App\Services\FileService;

/**
 * Unit test for the FileServiceclass
 * 
 */
class FileServiceTest extends TestCase
{
	/**
	 * @covers App\Services\FileService::refreshRecords
	 * @uses App\Services\FileService
	 */
	public function testGetUrls(){
		$fileService = new FileService();
		$fileService->refreshRecords();
	}
}