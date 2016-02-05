<?php

namespace App\Console\Commands;

use App\Services\Contracts\FileServiceInterface;
use Illuminate\Console\Command;

/**
 * Command class that handles the refreshing of records in Files table.
 */
class UpdateFile extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'updateFile';
	
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';
	
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct ();
	}
	
	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle(FileServiceInterface $fileService) {
		$fileService->refreshRecords ();
	}
}
