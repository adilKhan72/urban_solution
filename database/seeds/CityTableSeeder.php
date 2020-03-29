<?php

use Illuminate\Database\Seeder;
use App\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['php','javascript'];

        foreach ($cities as $key => $value) {

            $city = new City;
            $city->title = $value;
            $city->save();

        }
    }
}
