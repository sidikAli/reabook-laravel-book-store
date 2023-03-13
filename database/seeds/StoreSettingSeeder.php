<?php

use Illuminate\Database\Seeder;

class StoreSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\StoreSetting::create([
            'bank_name' => "Bank Mandiri",
            'bank_account_name' => "Reabook Indonesia",
            'bank_account_number' => '000111000122',
            'subdistricts_id' => 2108,
            'address_detail' => "Jl Pahlawan no 25",
        ]);
    }
}
