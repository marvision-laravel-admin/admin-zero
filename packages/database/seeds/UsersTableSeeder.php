<?php 

use Illuminate\Database\Seeder;  
use Role;
use User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        $role_admin = Role::where('name','admin')->first();
        $role_user = Role::where('name','user')->first();
        
        $admin = new User;
        $admin->firstname = 'Marwen';
        $admin->lastname = 'Hlaoui';
        $admin->username = 'marwenhlaoui';
        $admin->email = 'marwenhlaoui@gmail.com';
        $admin->password = bcrypt('mapass2016');  
        $admin->active = true;
        $admin->save();
        
        $admin->attachRole($role_user->id);
        $admin->attachRole($role_admin->id); 

       

        $this->command->info('User table seeded!');

    }
}
