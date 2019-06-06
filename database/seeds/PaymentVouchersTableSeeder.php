<?php

use Illuminate\Database\Seeder;

class PaymentVouchersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\PaymentVoucher::class, 40)->create();
    }
}
