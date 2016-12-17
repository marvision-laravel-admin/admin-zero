<?php

File::copy(__DIR__.'/../../packages/controllers/AppController.php', app_path('Http/Controllers/AppController.php'));

File::makeDirectory(resource_path('views'), 0775, true, true);

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
       $pg_auth = $this->choice('Create authentication pages ',['login','login & register','all']);
       if ($pg_auth == 'login') {
           $routeFileContent .= "

Route::get('/login','Auth\LoginController@showLoginForm')->name('login_path');
Route::post('/login','Auth\LoginController@login')->name('login_path'); 
Route::post('/logout','Auth\LoginController@logout')->name('logout_path');

";



       }elseif ($pg_auth == 'all') {
           $routeFileContent .= "
Auth::routes();

";

       }else{
           $routeFileContent .= "

Route::get('/login','Auth\LoginController@showLoginForm')->name('login_path');
Route::post('/login','Auth\LoginController@login')->name('login_path');
Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register_path');
Route::post('/register','Auth\RegisterController@register')->name('register_path');
Route::post('/logout','Auth\LoginController@logout')->name('logout_path');

";

       }


      File::copyDirectory(__DIR__.'/../../packages/controllers/Auth', app_path('Http/Controllers/Auth'));

      File::copyDirectory(__DIR__.'/../../packages/views/auth', resource_path('views/auth'));
      File::copyDirectory(__DIR__.'/../../packages/views/errors', resource_path('views/errors'));
      File::copyDirectory(__DIR__.'/../../packages/views/layouts', resource_path('views/layouts'));
      File::copyDirectory(__DIR__.'/../../packages/views/vendor', resource_path('views/vendor')); 

        File::put(base_path('routes/web.php'), $routeFileContent); 



       /* end load route file */