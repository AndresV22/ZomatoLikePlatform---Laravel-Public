<?php

use Illuminate\Database\Seeder;

class UserCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserCity::class, 20)->create();
    }
}
