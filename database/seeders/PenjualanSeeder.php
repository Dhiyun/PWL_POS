<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1, 
                'user_id'=> 1, 
                'pembeli' => 'Dhika',
                'penjualan_tanggal' => '2023-03-01 09:15:00'
            ],

            [
                'penjualan_id' => 2, 
                'user_id'=> 2,
                'pembeli' => 'Dany',
                'penjualan_tanggal' => '2023-03-01 09:30:00'
            ],

            [
                'penjualan_id' => 3, 
                'user_id'=> 2, 
                'pembeli' => 'Rifky',
                'penjualan_tanggal' => '2023-03-01 11:10:00'
            ],

            [
                'penjualan_id' => 4, 
                'user_id'=> 2, 
                'pembeli' => 'Cahyo',
                'penjualan_tanggal' => '2023-03-01 12:15:00'
            ],

            [
                'penjualan_id' => 5, 
                'user_id'=> 3, 
                'pembeli' => 'Rama',
                'penjualan_tanggal' => '2023-03-01 14:15:00'
            ],

            [
                'penjualan_id' => 6, 
                'user_id'=> 3, 
                'pembeli' => 'Gaco',
                'penjualan_tanggal' => '2023-03-01 15:00:00'
            ],

            [
                'penjualan_id' => 7, 
                'user_id'=> 3, 
                'pembeli' => 'Rakha',
                'penjualan_tanggal' => '2023-03-01 15:02:00'
            ],

            [
                'penjualan_id' => 8, 
                'user_id'=> 3, 
                'pembeli' => 'Kemal',
                'penjualan_tanggal' => '2023-03-01 15:03:00'
            ],

            [
                'penjualan_id' => 9, 
                'user_id'=> 3, 
                'pembeli' => 'Ariel',
                'penjualan_tanggal' => '2023-03-01 15:10:00'
            ],

            [
                'penjualan_id' => 10, 
                'user_id'=> 3, 
                'pembeli' => 'Eka',
                'penjualan_tanggal' => '2023-03-01 16:30:00'
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
