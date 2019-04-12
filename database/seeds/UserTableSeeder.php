<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('nombre','user')->first();
        $role_admin = Role::where('nombre','admin')->first();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'Daniel.Molist@gmail.com';
        $user->password = bcrypt('77152632');
        $user->save();
        $user->roles()->attach($role_admin); //Le asignamos el rol de administrador

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('77152632');
        $user->save();
        $user->roles()->attach($role_user); //Le asignamos el rol de usuario
    }
}
