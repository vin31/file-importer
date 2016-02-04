<?php
use App\Http\Controllers\ImportController;
use Illuminate\View\View;

/**
 * Unit test for the ImportController class
 *
 */
class ImportControllerTest extends TestCase
{
	/**
	 * @covers App\Http\Controllers\ImportController::summary
	 * @uses App\Http\Controllers\ImportController
	 */
	public function testControllerInstantiation(){
		$importController = new ImportController();
		$this->assertInstanceOf(ImportController::class, $importController);
	}
	
	/**
	 * @covers App\Http\Controllers\ImportController::summary
	 * @uses App\Http\Controllers\ImportController
	 * @uses Illuminate\View\View
	 */
	public function testSummary(){
		$importController = new ImportController();
		$this->assertInstanceOf(View::class,$importController->getSummary());
	}
}