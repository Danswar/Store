<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sell;
use Faker\Generator as Faker;

$factory->define(Sell::class, function (Faker $faker) {
    return [
        'total'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
    ];
});
