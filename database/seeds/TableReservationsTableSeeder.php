<?php

use Illuminate\Database\Seeder;

class TableReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TableReservation::class, 10)->create();
    }
}
