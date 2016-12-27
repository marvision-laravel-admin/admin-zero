<?php 

use Illuminate\Database\Seeder; 
use App\Role;
use App\Permission;
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

        $user = new Role;
        $user->name         = "user";
        $user->display_name = "User";
        $user->description  = "User role";
        $user->save();

        $admin = new Role;
        $admin->name         = "admin";
        $admin->display_name = "Admin";
        $admin->description  = "Admin role";
        $admin->save();

        $adminPermission = ['dashboard','show_users'];
        foreach ($adminPermission as $key => $permission) { 
            $admin->attachPermission(Permission::where('name',$permission)->first()->id);
        } 



        //$this->command->info('All roles is done !');

    }
}
