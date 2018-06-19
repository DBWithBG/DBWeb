<?php

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
        //ADMIN
        \App\User::create([
            'name' => 'ADMIN',
            'email' => 'admin@admin.fr',
            'password' => bcrypt('password'),
            'admin' => true,
            'is_confirmed' => true
        ]);

        //DRIVER
        $driver = \App\User::create([
            'name' => 'DRIVER',
            'email' => 'driver@driver.fr',
            'password' => bcrypt('password'),
            'admin' => false,
            'is_confirmed' => false
        ]);

        \App\Driver::create([
            'name' => 'DRIVER',
            'surname' => 'broom',
            'is_op' => false,
            'deleted' => false,
            'user_id' => $driver->id
        ]);

        //Customer
        $customer = \App\User::create([
            'name' => 'CUSTOMER',
            'email' => 'customer@customer.fr',
            'password' => bcrypt('password'),
            'admin' => false,
            'is_confirmed' => false
        ]);

        $real_customer = \App\Customer::create([
            'name' => 'customer',
            'surname' => 'clicli',
            'deleted' => false,
            'mobile_token' => '12345',
            'user_id' => $customer->id
        ]);

        


    }
}
