<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1, 
                'kategori_id'  => 1, 
                'barang_kode' => 'A001',
                'barang_nama' => 'Laptop',
                'harga_beli' => 8000000,
                'harga_jual' => 10000000,
            ],

            [
                'barang_id' => 2, 
                'kategori_id' => 1, 
                'barang_kode' => 'A002',
                'barang_nama' => 'Handphone',
                'harga_beli' => 4000000,
                'harga_jual' => 5000000,
            ],

            [
                'barang_id' => 3, 
                'kategori_id' => 2, 
                'barang_kode' => 'B001',
                'barang_nama' => 'Pensil',
                'harga_beli' => 1500,
                'harga_jual' => 2000,
            ],

            [
                'barang_id' => 4, 
                'kategori_id' => 2, 
                'barang_kode' => 'B002', 
                'barang_nama' => 'Bulpen',
                'harga_beli' => 2000,
                'harga_jual' => 4000,
            ],

            [
                'barang_id' => 5, 
                'kategori_id' => 3, 
                'barang_kode' => 'C001',
                'barang_nama' => 'Meja',
                'harga_beli' => 350000,
                'harga_jual' => 500000,
            ],

            [
                'barang_id' => 6, 
                'kategori_id' => 3, 
                'barang_kode' => 'C002',
                'barang_nama' => 'Kursi',
                'harga_beli' => 150000,
                'harga_jual' => 250000,
            ],

            [
                'barang_id' => 7, 
                'kategori_id' => 4, 
                'barang_kode' => 'D001',
                'barang_nama' => 'Barbel',
                'harga_beli' => 18000,
                'harga_jual' => 29000,
            ],

            [
                'barang_id' => 8, 
                'kategori_id' => 4, 
                'barang_kode' => 'D002',
                'barang_nama' => 'Tali Skipping',
                'harga_beli' => 9000,
                'harga_jual' => 12000,
            ],

            [
                'barang_id' => 9, 
                'kategori_id' => 4, 
                'barang_kode' => 'E001',
                'barang_nama' => 'Mie Goreng',
                'harga_beli' => 1000,
                'harga_jual' => 2500,
            ],

            [
                'barang_id' => 10, 
                'kategori_id' => 4, 
                'barang_kode' => 'E002',
                'barang_nama' => 'Nugget',
                'harga_beli' => 18000,
                'harga_jual' => 24000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
