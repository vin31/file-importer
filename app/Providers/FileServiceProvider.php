<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Impl\FileServiceImpl;
use App\Services\Contracts\FileService;

class FileServiceProvider extends ServiceProvider
{
    protected $defer = true;
	
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//         $this->app->singleton('App\Services\Contracts\FileService', function () {
//             return new FileServiceImpl();
//         });

//     	$this->app->bind('App\Services\Contracts\FileService', function(){
    	
//     		return new FileServiceImpl();
    	
//     	});

    	$this->app->bind('App\Services\Contracts\FileService', 'App\Services\Impl\FileServiceImpl');
    }
    
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
    	return ['App\Services\Contracts\FileService'];
    }
    
}
