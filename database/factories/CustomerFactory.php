<?php
/**
 * Created by PhpStorm.
 * User: yoan
 * Date: 3/22/19
 * Time: 4:27 PM
 */

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber
    ];
});
