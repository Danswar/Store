<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'product_id'=>factory(App\Product::class),
        'cantidad'=>$faker->numberBetween($min = 20, $max = 100),
        'p_costo'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
        'p_costo_usd'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 50),
        'p_venta'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
    ];
});
          
            