<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Mamunur Rashid Mamun',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678')
        ];
        Customer::create($admin);
    }
}
