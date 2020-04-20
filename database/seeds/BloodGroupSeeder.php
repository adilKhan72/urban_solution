<?php

use Illuminate\Database\Seeder;
use App\BloodGroup;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloodgroups = [
           ['A+',['A+','AB+'],['A+','A-','O+','O-']],
           ['O+',['O+','A+','B+','AB+'],['O+','O-']],
           ['B+',['B+','AB+'],['B+','B-','O+','O-']],
           ['AB+',['AB+'],['everyone']],
           ['A-',['A+','AB+','A-','AB-'],['A-','O-']],
           ['O-',['everyone'],['O-']],
           ['B-',['B+','B-','AB+','AB-'],['B-','O-']],
           ['AB-',['AB+','AB-'],['A-','B-','AB-','O-']]
        ];

        foreach ($bloodgroups as $key => $value) {

            $degree = new BloodGroup;
            $degree->blood_type = $value[0];
            $degree->donate_blood_to = json_encode($value[1]);
            $degree->receive_blood_from = json_encode($value[2]);
            $degree->save();

        }
    }
}
