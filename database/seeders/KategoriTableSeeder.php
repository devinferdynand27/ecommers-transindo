<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [
                'name' => 'Makanan',
                'image' => 'Makanan.png',
                'slug' => 'Makanan-search?',
            ],
            [
                'name' => 'Minuman',
                'image' => 'Minuman.png',
                'slug' => 'Minuman-search?',
            ],
            [
                'name' => 'Snack',
                'image' => 'Snack.png',
                'slug' => 'Snack-search?',
            ],
            [
                'name' => 'Obat Obatan',
                'image' => 'Obat.png',
                'slug' => 'Obat-search?',
            ],
            [
                'name' => 'Buah Buahan',
                'image' => 'Buah.png',
                'slug' => 'Buah-search?',
            ],
            [
                'name' => 'Sereal',
                'image' => 'Sereal.png',
                'slug' => 'Sereal-search?',
            ],
        ]);
    }
}

