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
        $this->call(IngredientsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(TablesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRegistersTableSeeder::class);
        $this->call(MenuDishesTableSeeder::class);
        $this->call(PermissionRolesTableSeeder::class);
        $this->call(TableReservationsTableSeeder::class);
        $this->call(UserCitiesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
    }
}
