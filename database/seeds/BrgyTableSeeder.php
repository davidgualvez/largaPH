<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BrgyTableSeeder extends Seeder
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
        $test = storage_path().'/json/refbrgy.json';
        $json = json_decode(file_get_contents($test), true); 
        //dd($json['RECORDS'][1]['regDesc']);
        foreach ($json['RECORDS'] as $r) {
            # code... 
            DB::table('brgy')->insert([
                    'description' => $r['brgyDesc'],
                    'brgyCode' => $r['brgyCode'],
                    'cityMunCode' => $r['citymunCode'],
                    'created_at' => $carbon->now(),
                    'updated_at' => $carbon->now()
                ]);
        }
    }
}
