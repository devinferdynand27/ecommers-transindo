<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'company_name' => 'transindo Food',
            'company_address' => 'cikutra',
            'contact' => '02839293829',
            'description' => 'begerak di bidang makanan',
            'roles' => 'Merchant',
            'password' => Hash::make('admin@gmail.com'),
        ]);
    }
}
