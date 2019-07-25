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
            'name' => 'guest',
            'role_id' => 2,
            'email' => 'guest@email.com',
            'password' => '$2y$10$3vr4OQi4SA323QMZaPJxm.Xy6eXz4zVbLIvix4S6lGknzU8.HAe96',
            'phone_number' => 0,
            'address' => 'none',
            'avatar' => 'https://picsum.photos/100',
        ]);
        factory(App\User::class, 50)->create();
    }
}
