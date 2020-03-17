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
        $task = new Role;
        $task->name = 'Admin';
        $task->display_name = 'admin';
        $task->description = 'Ceo, Directors, Admins of the company and have Admin rights';
        $task->save();

        $task = new Role;
        $task->name = 'Principals';
        $task->display_name = 'principals';
        $task->description = 'Principals are architects, project managers, Cordinators etc. the project will be assigned to them';
        $task->save();

        $task = new Role;
        $task->name = 'Assistants';
        $task->display_name = 'assistants';
        $task->description = 'Darftsman, Helpers who can help managers in their project through tasks to complete the projects';
        $task->save();
    }
}
