<?php

use Illuminate\Database\Seeder;

class MenuDishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MenuDish::class, 10)->create();
    }
}
