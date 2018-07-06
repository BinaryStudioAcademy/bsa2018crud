<?php

use Illuminate\Database\Seeder;

class ECurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ECurrency::class, 50)->create();
    }
}
