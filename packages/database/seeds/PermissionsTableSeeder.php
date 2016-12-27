<?php 

use Illuminate\Database\Seeder; 

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            [ 
                'name'          => 'dashboard',
                'display_name'  => 'Dashboard',
                'description'   => 'Aaccess to back-end'
            ],
            [ 
                'name'          => 'show_users',
                'display_name'  => 'Show Users',
                'description'   => 'Aaccess to show list of users'
            ],
        ));
        //$this->command->info('All permissions is done !');

    }
}
