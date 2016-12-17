<?php

 
/* load all files in packages/model to app/ */


	File::copyDirectory(__DIR__.'/../../packages/model/', app_path('/'));
 
/* load all files in packages/database/ to app/ */


	File::copyDirectory(__DIR__.'/../packages/database/', base_path('database/'));