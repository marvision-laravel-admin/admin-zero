<?php 

use Illuminate\Database\Seeder;  
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$role_admin = Role::where('name','admin')->first();
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
        $admin->attachRole($role_admin->id);*/

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$zKG9LO0VcGgM4LmysRupkOaplMSDG5mvbX0kfj1MKeE0Cx/qo9zXq',
                'remember_token' => 'L0fY96Ek3r30dUE9e482JwmjxV4iKYxZ4YGBcibz7Qu0eSA31dPyR0ilR5Cc',
                'created_at' => '2016-01-28 11:20:57',
                'updated_at' => '2016-10-25 14:32:23',
                'avatar' => 'users/default.png',
            ),
        ));
        $this->command->info('User table seeded!');

    }
}
