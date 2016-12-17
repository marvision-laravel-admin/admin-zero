<?php 

use Illuminate\Database\Seeder; 

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            [ 
                'name'          => 'user',
                'display_name'  => 'User',
                'description'   => 'User role'
            ],
            [ 
                'name'          => 'admin',
                'display_name'  => 'Admin',
                'description'   => 'Admin role'
            ],
        ));
        $this->command->info('All roles is done !');

    }
}
