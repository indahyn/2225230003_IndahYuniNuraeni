<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['kategori' => 'Olahraga'],
            ['kategori' => 'Teknologi'],
            ['kategori' => 'Kesehatan'],
            ['kategori' => 'Hiburan'],
        ]);
    }
}
