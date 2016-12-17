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
                'display_name'  => 'dashboard',
                'description'   => 'access to back-end'
            ],
        ));
        $this->command->info('All permissions is done !');

    }
}
