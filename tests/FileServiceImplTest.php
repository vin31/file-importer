<?php
use App\Services\Impl\FileServiceImpl;

/**
 * Unit test for the FileServiceImpl class
 * 
 */
class FileServiceImplTest extends TestCase
{
	/**
	 * @covers App\Services\Impl\FileServiceImpl::refreshRecords
	 * @uses App\Services\Impl\FileServiceImpl
	 */
	public function testGetUrls(){
		$fileService = new FileServiceImpl();
		$fileService->refreshRecords();
	}
}