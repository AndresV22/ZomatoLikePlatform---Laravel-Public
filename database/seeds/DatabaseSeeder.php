<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(PaymentVouchersTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(DishesTableSeeder::class);
        /*
        $this->call(DishesTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(TablesTableSeeder::class);
        */
    }
}
