<?php

       /* load .env file */
       $env = $this->choice('What is your Database type ? ', ['mysql', 'sqlite']);

        if ($this->confirm('Your project in local host ? ','yes')) {
       $fileContent = "APP_ENV=local
APP_DEBUG=true";

        }else{ 
            
       $fileContent = "APP_ENV=host
APP_DEBUG=false";
        }

       $fileContent .= "
APP_KEY=
";

       if ($env == 'sqlite') {
           $fileContent .= "
DB_CONNECTION=sqlite
DB_FILE=database.sqlite 
DB_DRIVER=sqlite
";
        File::put(database_path('database.sqlite'), ""); 
        
       }elseif ($env == 'mysql') {

        $mysql_host = $this->ask('What is your Host ? ','127.0.0.1');
        $mysql_host = (!empty($mysql_host)) ? $mysql_host : "127.0.0.1" ;

        $mysql_port = $this->ask('What is your Database port ? ', '3306');
        $mysql_port = (!empty($mysql_port)) ? $mysql_port : "3306" ;

        $mysql_db = $this->ask('What is your Database name ? ');

        $mysql_u = $this->ask('What is your Database username ? ','root');
        $mysql_u = (!empty($mysql_u)) ? $mysql_u : "root" ;

        if ($this->confirm('Do you want a default password ? ','yes')) {
            $mysql_p = "";
        }else{ 
            $mysql_p = $this->secret('What is your Database password ? ');
        }  


           $fileContent .= "
DB_CONNECTION=mysql
DB_HOST=".$mysql_host."
DB_PORT=".$mysql_port."
DB_DATABASE=".$mysql_db."
DB_USERNAME=".$mysql_u."
DB_PASSWORD=".$mysql_p."
"; 
       }

           $fileContent .= "
BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_KEY=
PUSHER_SECRET=";

        File::put(base_path('.env'), $fileContent); 
        Artisan::call('key:generate');
        
       /* end load .env file */