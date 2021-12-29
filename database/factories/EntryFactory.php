<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AccountingEntry;
use App\Item;
use Faker\Generator as Faker;

$factory->define(AccountingEntry::class, function (Faker $faker) {
    return [
        'item_id'=>rand(1, Item::count()),
        'payment_amount'=>$faker->numberBetween($min = 25000, $max = 100000),
        'payment_date'=>$faker->date($format = 'Y-m-d', $max = 'now') ,
        'note'=>$faker->text
    ];
});
