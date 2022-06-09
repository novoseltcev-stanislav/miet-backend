<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;

class CountCustomerAddresses extends Command
{
    protected $signature = 'customer:n-addresses {id}';
    protected $description = 'Count customer\'s addresses';
    public function handle() {
        $id = $this->argument('id');
        try {
            $customer = Customer::query()->findOrFail($id)->addresses->count();
        } catch (\Exception) {
            $customer = 0;
        } finally {
            $this->info($customer);
        }
    }
}
