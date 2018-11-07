<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VehicleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $carbon = new Carbon();
        DB::table('vehicle_type')->insert([
        	[
            'description' => 'Motorcycle',
            'created_at' => $carbon->now(),
            'updated_at' => $carbon->now()
        	],
        	[
            'description' => 'Sedan',
            'created_at' => $carbon->now(),
            'updated_at' => $carbon->now()
        	],
        	[
            'description' => 'Suv',
            'created_at' => $carbon->now(),
            'updated_at' => $carbon->now()
        	],
        	[
            'description' => 'Van',
            'created_at' => $carbon->now(),
            'updated_at' => $carbon->now()
        	],
        	[
            'description' => 'Bus',
            'created_at' => $carbon->now(),
            'updated_at' => $carbon->now()
        	],
        	[
            'description' => 'Truck',
            'created_at' => $carbon->now(),
            'updated_at' => $carbon->now()
        	]
        ]);
    }
}
