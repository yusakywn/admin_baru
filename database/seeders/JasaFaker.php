<?php

namespace Database\Seeders;

use App\Models\Jasa;
use App\Models\JasaDetails;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class JasaFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i<=20; $i++) {
            $random = rand();
            Jasa::create([
                'jasa_order_id' => $random,
                'jasa_order_status' => 'success',
            ]);
            JasaDetails::create([
                'jasa_order_id' => $random,
                'jasa_order_price' => $faker->numberBetween(0, 100000),
            ]);

        }
    }
}
