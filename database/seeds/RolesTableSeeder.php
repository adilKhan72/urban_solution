<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->name = 'Admin';
        $role->display_name = 'admin';
        $role->description = 'Ceo, Directors, Admins of the company and have Admin rights';
        $role->save();

        $role = new Role;
        $role->name = 'Principals';
        $role->display_name = 'principals';
        $role->description = 'Principals are architects, project managers, Cordinators etc. the project will be assigned to them';
        $role->save();

        $role = new Role;
        $role->name = 'Assistants';
        $role->display_name = 'assistants';
        $role->description = 'Darftsman, Helpers who can help managers in their project through tasks to complete the projects';
        $role->save();
    }
}
