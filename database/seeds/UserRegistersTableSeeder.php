<?php

use Illuminate\Database\Seeder;

class UserRegistersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserRegister::class, 40)->create();
    }
}
