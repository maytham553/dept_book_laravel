<?php

use App\AccountingEntry;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AccountingEntry::class ,60)->create() ;
    }
}
