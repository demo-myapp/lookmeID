<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //menggunakan query builder
        DB::insert("INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
        (1, 'Bali', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (2, 'Bangka Belitung', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (3, 'Banten', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (4, 'Bengkulu', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (5, 'DI Yogyakarta', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (6, 'DKI Jakarta', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (7, 'Gorontalo', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (8, 'Jambi', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (9, 'Jawa Barat', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (10, 'Jawa Tengah', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (11, 'Jawa Timur', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (12, 'Kalimantan Barat', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (13, 'Kalimantan Selatan', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (14, 'Kalimantan Tengah', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (15, 'Kalimantan Timur', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (16, 'Kalimantan Utara', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (17, 'Kepulauan Riau', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (18, 'Lampung', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (19, 'Maluku', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (20, 'Maluku Utara', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (21, 'Nanggroe Aceh Darussalam (NAD)', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (22, 'Nusa Tenggara Barat (NTB)', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (23, 'Nusa Tenggara Timur (NTT)', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (24, 'Papua', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (25, 'Papua Barat', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (26, 'Riau', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (27, 'Sulawesi Barat', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (28, 'Sulawesi Selatan', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (29, 'Sulawesi Tengah', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (30, 'Sulawesi Tenggara', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (31, 'Sulawesi Utara', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (32, 'Sumatera Barat', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (33, 'Sumatera Selatan', '2021-06-03 07:10:12', '2021-06-03 07:10:12'),
        (34, 'Sumatera Utara', '2021-06-03 07:10:12', '2021-06-03 07:10:12');");
    }
}
