<?php
/**
 * Created by PhpStorm.
 * User: yoan
 * Date: 3/22/19
 * Time: 4:45 PM
 */
use Faker\Generator as Faker;


$factory->define(App\Booking::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->numberBetween(1,10),
        'room_id' => $faker->numberBetween(1,16),
        'hotel_id' => $faker->numberBetween(1,3),
        'amount' => $faker->randomFloat(2,100,1000),
        'tax' => $faker->randomFloat(2,1,100),
        'fee'=> $faker->randomFloat(2,1,10),
        'time_from' => $faker->dateTimeBetween($startDate = '-3 week', $endDate = 'now', $timezone = null),
        'time_to' => $faker->dateTimeBetween($startDate = '-1 day', $endDate = 'now + 3 weeks', $timezone = null)
    ];
});

