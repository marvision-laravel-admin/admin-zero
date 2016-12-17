<?php

namespace MarvisionLaravelAdmin\AdminZero;

use Illuminate\Support\ServiceProvider;

class AdminZeroServiceProvider extends ServiceProvider
{

	public function boot()
	{
		/* loading the config file */
		require_once __DIR__.'/Http/config.php';  
		
		/* loading the routes files */
		require_once __DIR__.'/Http/routes.php';  

		/* loading the views files */

		$this->loadViewsFrom(__DIR__.'/views','AdminZeroView');

		/* loading translation files */

		$this->loadTranslationsFrom(__DIR__.'/lang','AdminZeroLang'); 
 
	}


	public function register(){ 


		$this->registerResources();

		$this->app->bind('zero_admin',function($app){
			return new ZeroAdmin;
		});

        $this->app->booting(function() {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance(); 
        });

        $this->app['command.zero_admin'] = $this->app->share(function($app) {
            return new AdminZeroCommand;
        });
        
        $this->commands('command.zero_admin');
        

  
	}


	

	protected function registerResources(){

		
        
	 	/* define files which are going to be published */

		$this->publishes([
			/* Publish the assets to the Public folder */
			__DIR__.'/../assets' => public_path('assets/layouts/admin'), 
			], 'public');  


 
		$this->publishes([
            /* Publish the views to the Views folder */
            __DIR__.'/../packages/views' => resource_path('views'), 
            ]); 
 
    }


}