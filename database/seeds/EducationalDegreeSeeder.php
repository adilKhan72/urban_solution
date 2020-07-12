<?php

use Illuminate\Database\Seeder;
use App\EducationalDegree;

class EducationalDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $degree_titles = ["Non-Matriculation", "Matriculation/O-Level", "Intermediate/A-Level", "BA", "BFA", "BBA", "BS", "BEd", "BCom", "BCom Hons", "BDS", "LLB", "MEd", "LLM", "MBA", "MCom", "MCom Hons", "MFA", "MPA", "MBBS", "Pharm-D", "Mphil", "PHD", "Diploma", "Certificate", "Short Course"];

        foreach ($degree_titles as $key => $value) {

            $degree = new EducationalDegree;
            $degree->title = $value;
            $degree->save();

        }

    }
}
