<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkuninternalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('akuninternal')->insert([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'level' => 'Admin',
        ]);
    }
}
