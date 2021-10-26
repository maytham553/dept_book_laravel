<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class , 30)->create();
    }
}

// factory(App\Customer::class, 10)->create()->each(function ($customer) {
//     // Seed the relation with one address
//     $address = factory(App\CustomerAddress::class)->make();
//     $customer->address()->save($address);

//     // Seed the relation with 5 purchases
//     $purchases = factory(App\CustomerPurchase::class, 5)->make();
//     $customer->purchases()->saveMany($purchases);
// });
