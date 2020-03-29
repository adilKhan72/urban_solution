<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = ['php','javascript'];

        foreach ($countries as $key => $value) {

            $country = new Country;
            $country->title = $value;
            $country->save();

        }
    }
}
