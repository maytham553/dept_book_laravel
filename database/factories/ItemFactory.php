<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'customer_id' => rand(1, Customer::count()),
        'name' => $faker->word,
        'total_amount' => $faker->numberBetween($min = 1000000, $max = 1500000),
        'installment_amount' => $faker->numberBetween($min = 25000, $max = 100000),
        'date_of_payment' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'note' => $faker->text,
    ];
});
