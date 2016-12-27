<?php

File::copy(__DIR__.'/../../packages/controllers/AppController.php', app_path('Http/Controllers/AppController.php'));

File::makeDirectory(resource_path('views/auth'), 0775, true, true);

       /* load route file */
       $routeFileContent = "<?php ";
       $pg_home = $this->choice('Create home page ', ['default', 'Coming soon']);
       if ($pg_home == 'default') {
           $routeFileContent .= "
Route::get('/', 'AppController@index')->name('home_path');

";
          
            File::copy(__DIR__.'/../../packages/views/welcome.blade.php', resource_path('views/welcome.blade.php'));


       }else{
           $routeFileContent .= "
Route::get('/', 'AppController@soon')->name('home_path');

";
          
            File::copy(__DIR__.'/../../packages/views/soon.blade.php', resource_path('views/soon.blade.php'));

       }



/**
* auth
**/


       $pg_auth = $this->choice('Create authentication pages ',['login','login & register','all']);


       /**
       *  Just Login page
       **/

       if ($pg_auth == 'login') {

           $routeFileContent .= "
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login')->name('login'); 
Route::post('/logout','Auth\LoginController@logout')->name('logout');

";


      File::copy(__DIR__.'/../../packages/controllers/Auth/LoginController.php', app_path('Http/Controllers/Auth/LoginController.php'));
 
      File::copyDirectory(__DIR__.'/../../packages/views/auth/login', resource_path('views/auth'));

       }elseif ($pg_auth == 'all') {


           $routeFileContent .= "
Auth::routes();

";

      File::copyDirectory(__DIR__.'/../../packages/controllers/Auth', app_path('Http/Controllers/Auth'));

      File::copyDirectory(__DIR__.'/../../packages/views/auth/all', resource_path('views/auth')); 

       }else{


           $routeFileContent .= "
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register','Auth\RegisterController@register')->name('register');
Route::post('/logout','Auth\LoginController@logout')->name('logout');

";
      File::copy(__DIR__.'/../../packages/controllers/Auth/LoginController.php', app_path('Http/Controllers/Auth/LoginController.php'));
      File::copy(__DIR__.'/../../packages/controllers/Auth/RegisterController.php', app_path('Http/Controllers/Auth/RegisterController.php'));

      File::copyDirectory(__DIR__.'/../../packages/views/auth/login_register', resource_path('views/auth'));



       }



      File::copyDirectory(__DIR__.'/../../packages/views/errors', resource_path('views/errors'));
      File::copyDirectory(__DIR__.'/../../packages/views/layouts', resource_path('views/layouts'));
      File::copyDirectory(__DIR__.'/../../packages/views/vendor', resource_path('views/vendor')); 

           $routeFileContent .= "
require_once 'admin/base.php';

";
      File::put(base_path('routes/web.php'), $routeFileContent); 
      File::makeDirectory(base_path('routes/admin'), 0775, true, true);
      File::copyDirectory(__DIR__.'/../../src/routes', base_path('routes/admin'));



       /* end load route file */