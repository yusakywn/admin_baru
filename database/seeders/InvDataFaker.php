<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\Inv;
use App\Models\InvDetails;

class InvDataFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=1; $i<=10; $i++) {
            $random = rand();
            Inv::create([
                'inv_order_id' => $random,
                'inv_buyer_id' => $faker->numberBetween(1, 9),
                'inv_order_type' => 'Templates',
                'created_at' => $faker->date($format = 'Y-m-d h:i:s', $max = 'now'),
                'inv_order_status' => 'success',
            ]);

            InvDetails::create([
                'inv_order_id' => $random,
                'inv_order_price' => $faker->numberBetween($min = 50000, $max = 1000000),
                'inv_payment_type' => $faker->creditCardType,
                'created_at' => $faker->date($format = 'Y-m-d h:i:s', $max = 'now'),
                'inv_payment_status' => 'success',
            ]);
        }
    }
}
