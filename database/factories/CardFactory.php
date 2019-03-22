<?php
/**
 * Created by PhpStorm.
 * User: yoan
 * Date: 3/22/19
 * Time: 5:03 PM
 */
use Faker\Generator as Faker;


$factory->define(App\Card::class, function (Faker $faker) {
    return [
        'number' => $faker->creditCardNumber,
        'expiration' => $faker->creditCardExpirationDate,
        'nameOnCard' => $faker->name,
        'ccv' => $faker->numberBetween(100,1000)
    ];
});
