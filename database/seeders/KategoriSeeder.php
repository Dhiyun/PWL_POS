<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1, 
                'kategori_kode'=> 'ELK', 
                'kategori_nama' => 'Elektronik',
            ],

            [
                'kategori_id' => 2, 
                'kategori_kode'=> 'ALT', 
                'kategori_nama' => 'Alat Tulis',
            ],

            [
                'kategori_id' => 3, 
                'kategori_kode'=> 'FRT', 
                'kategori_nama' => 'Furniture',
            ],

            [
                'kategori_id' => 4, 
                'kategori_kode'=> 'OLR', 
                'kategori_nama' => 'Olah Raga',
            ],

            [
                'kategori_id' => 5, 
                'kategori_kode'=> 'MKN', 
                'kategori_nama' => 'Makanan',
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
