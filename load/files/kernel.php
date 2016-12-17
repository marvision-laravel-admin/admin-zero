<?php
 
/* load kernel file in packages/ to app/Http/ */


	File::copy(__DIR__.'/../../packages/app.kernel.php', app_path('Http/Kernel.php'));