<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->text(50),
        'stock'=> $faker->numberBetween($min = 20, $max = 100),
        'stock_min'=> $faker->numberBetween($min = 1, $max = 30),
        'alert_stock'=> $faker->boolean($chanceOfGettingTrue = 90),
        'p_costo'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
        'p_costo_usd'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 50),
        'p_venta'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
    ];
});
