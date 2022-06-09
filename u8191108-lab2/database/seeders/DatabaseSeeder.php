<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_rows_count = 100;
        Customer::factory($new_rows_count)->create();
        Address::factory($new_rows_count)->create();
    }
}
