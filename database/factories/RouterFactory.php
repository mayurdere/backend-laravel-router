<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Router;
use App\User;
use Faker\Generator as Faker;
use Faker\Provider\Internet;

$factory->define(Router::class, function (Faker $faker) {
    // $sap_id = $faker->randomDigit;
    return [
        'sap_id' => $faker->randomNumber($nbDigits = 7, $strict = true),
        'hostname' => $faker->regexify('root+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
        'loopback' => $faker->ipv4(),
        'mac_address' => $faker->macAddress(),
        'type' => $faker->regexify('AG1+/CSS'),
        'user_id' => function() {
            return User::all()->random();
        }

    ];
});
