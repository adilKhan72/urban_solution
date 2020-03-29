<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $user->fname = 'admin';
        $user->lname = 'user';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('root123');
        $user->save();
    }
}
