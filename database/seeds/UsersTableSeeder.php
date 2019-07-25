<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 0,
            'name' => 'Guest',
            'role_id' => 2,
            'email' => 'guest@email.com',
            'password' => bcrypt('nopassword'),
            'phone_number' => 123456789,
            'address' => 'none',
            'avatar' => 'https://picsum.photos/100',
        ]);
        factory(App\User::class, 50)->create();
    }
}
