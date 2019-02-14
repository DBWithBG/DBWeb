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
            'mobile_token' => '',
            'user_id' => $customer->id
        ]);

        \App\AuthorizedDepartment::create([
            'name' => 'Gironde',
            'number' => '33'
        ]);

        \App\AuthorizedDepartment::create([
            'name' => 'Vosges',
            'number' => '88'
        ]);

        \App\TypeBag::create([
            'name' => 'BAGAGE SOUTE',
            'length' => 100,
            'width' => 100,
            'height'=> 100,
            'price' => 0.00
        ]);

        \App\TypeBag::create([
            'name' => 'BAGAGE MAIN',
            'length' => 10,
            'width' => 10,
            'height'=> 10,
            'price' => 0.00
        ]);

        \App\TypeBag::create([
            'name' => 'AUTRE',
            'length' => 250,
            'width' => 250,
            'height'=> 250,
            'price' => 10.00
        ]);

        \App\Price::create([
            'createur' => 'AUTRE',
            'bags_min' => 0,
            'bags_max' => 10000,
            'to_add_driver'=> 10,
            'coef_kilometers_driver' => 0,
            'coef_bags_driver' => 0,
            'coef_total_driver' => 1,
            'coef_deliver' => 0,
            'promotion' => 0
        ]);

        /*\App\Price::create([
            'createur' => 'AUTRE',
            'bags_min' => 0,
            'bags_max' => 8,
            'to_add_driver'=> 3,
            'coef_kilometers_driver' => 2,
            'coef_bags_driver' => 1,
            'coef_total_driver' => 1.2,
            'coef_deliver' => 0.333334,
            'promotion' => 0
        ]);

        \App\Price::create([
            'createur' => 'AUTRE',
            'bags_min' => 8,
            'bags_max' => 1000,
            'to_add_driver'=> 3,
            'coef_kilometers_driver' => 2,
            'coef_bags_driver' => 1,
            'coef_total_driver' => 1.2,
            'coef_deliver' => 0.333334,
            'promotion' => 0
        ]);*/

        \App\Reglage::create([
            'no_facture' => 999
        ]);






    }
}
