<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserInformation;
use App\RoleUser;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->first_name = 'admin';
        $user->last_name = 'user';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('root123');
        $user->save();

        $userinformation = new UserInformation;
        $userinformation->user_id = $user->id;
        $userinformation->save();

        $roleuser = new RoleUser;
        $roleuser->user_id = $user->id;
        $roleuser->role_id = '1';
        $roleuser->save();
    }
}
