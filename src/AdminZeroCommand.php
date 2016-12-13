<?php
namespace MarvisionLaravelAdmin\AdminZero;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Exception;

class AdminZeroCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'adminZero:install';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Admin Zero package';
    /**
     * Create a new command instance.
     *
     * @return \Orangehill\Iseed\IseedCommand
     */
    public function __construct()
    {
        parent::__construct();
    }
    protected function getOptions()
    {
        return array(
            array('existing', null, InputOption::VALUE_NONE, 'install on existing laravel application', null),
        );
    }
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        if(!$this->option('existing')){
            $this->info("Generating the default authentication scaffolding");
            Artisan::call('make:auth');
        }
        $this->info("Publishing the Voyager assets, database, and config files");
        Artisan::call('vendor:publish');
        $this->info("Migrating the database tables into your application");
        Artisan::call('migrate');
        $this->info("Dumping the autoloaded files and reloading all new files");
        
        $process = new Process('composer dump-autoload');
        $process->run();
        $this->info("Seeding data into the database");
        $process = new Process('php artisan db:seed --class=AdminZeroDatabaseSeeder');
        $process->run();
        
        $this->info("Adding the storage symlink to your public folder");
        Artisan::call('storage:link');
        $this->info("Successfully installed Admin Zero! Enjoy :)");
        return;
        
    }
}