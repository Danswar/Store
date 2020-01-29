<?php

use Illuminate\Database\Seeder;

class SellsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Sell::class,50)->create()
        ->each( function($sell){
            $sell->items()->save(factory(App\Item::class)->make());
            $sell->items()->save(factory(App\Item::class)->make());
            $sell->items()->save(factory(App\Item::class)->make());
            $sell->items()->save(factory(App\Item::class)->make());
            $sell->items()->save(factory(App\Item::class)->make());
            $sell->items()->save(factory(App\Item::class)->make());
            $sell->items()->save(factory(App\Item::class)->make());
            $sell->items()->save(factory(App\Item::class)->make());
            $sell->items()->save(factory(App\Item::class)->make());
        });
    }
}
