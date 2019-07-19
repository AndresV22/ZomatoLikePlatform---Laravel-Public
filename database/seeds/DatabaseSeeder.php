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
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(PaymentVouchersTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(DishesTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(TablesTableSeeder::class);
        $this->call(UserRegistersTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(PermissionRolesTableSeeder::class);
        $this->call(TableReservationsTableSeeder::class);
        $this->call(UserCitiesTableSeeder::class);
    }
}
