<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $skills = ['php','javascript'];

        foreach ($skills as $key => $value) {

            $skill = new Skill;
            $skill->title = $value;
            $skill->save();

        }
    }
}
