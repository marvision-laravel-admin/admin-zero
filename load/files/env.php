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
CACHE_DRIVER=array
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379 ";

       /*
       *  E-mail
       */



        if ($this->confirm('Do you want a default email account [laravel.marwenhlaoui@gmail.com] ? ','yes')) {
            
            $email_pass = $this->secret('What is your E-mail password [laravel.marwenhlaoui@gmail.com] ? ');

           $fileContent .= "
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=laravel.marwenhlaoui@gmail.com
MAIL_PASSWORD=".$email_pass."
MAIL_ENCRYPTION=tls";

        }else{ 


            $email_adress = $this->ask('What is your E-mail ? ');
            $email_pass = $this->secret('What is your E-mail password ['.$email_adress.'] ? ');
            $email_driver = $this->ask('What is your E-mail driver ? ','smtp');
            $email_host = $this->ask('What is your E-mail host ? ','smtp.gmail.com');
            $email_port = $this->ask('What is your E-mail port ? ','587');
            $email_enc = $this->ask('What is your E-mail ENCRYPTION ? ','tls');
            
           $fileContent .= "
MAIL_DRIVER=".$email_driver."
MAIL_HOST=".$email_host."
MAIL_PORT=".$email_port."
MAIL_USERNAME=".$email_adress."
MAIL_PASSWORD=".$email_pass."
MAIL_ENCRYPTION=".$email_enc."
";


        }














           $fileContent .= "
PUSHER_APP_ID=
PUSHER_KEY=
PUSHER_SECRET=";

        File::put(base_path('.env'), $fileContent); 
        Artisan::call('key:generate');
        
       /* end load .env file */