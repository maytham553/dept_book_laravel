<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->e164PhoneNumber     ,
        'max_debt' => $faker->numberBetween($min = 1000, $max = 9000),
        'note' => $faker->text
    ];
});
