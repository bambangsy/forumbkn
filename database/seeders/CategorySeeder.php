<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Manajemen Kepegawaian',
                'description' => 'Ini adalah deskripsi untuk Manajemen Kepegawaian.',
            ],
            [
                'name' => 'Pemberhentian Pegawai',
                'description' => 'Ini adalah deskripsi untuk Pemberhentian Pegawai.',
            ],
            [
                'name' => 'Administrasi Pengadaan dan Mutasi Pegawai',
                'description' => 'Ini adalah deskripsi untuk Administrasi Pengadaan dan Mutasi Pegawai.',
            ],
            [
                'name' => 'Pengadaan Pegawai',
                'description' => 'Ini adalah deskripsi untuk Pengadaan Pegawai.',
            ],
            [
                'name' => 'Pembinaan dan Pengembangan Pegawai',
                'description' => 'Ini adalah deskripsi untuk Pembinaan dan Pengembangan Pegawai.',
            ],
            [
                'name' => 'Perencanaan Pegawai',
                'description' => 'Ini adalah deskripsi untuk Perencanaan Pegawai.',
            ],
            [
                'name' => 'Peraturan Perundang-undangan Kepegawaian',
                'description' => 'Ini adalah deskripsi untuk Peraturan Perundang-undangan Kepegawaian.',
            ],
            [
                'name' => 'Perancangan Peraturan Perundang-undangan',
                'description' => 'Ini adalah deskripsi untuk Perancangan Peraturan Perundang-undangan.',
            ],
            [
                'name' => 'Pengelolaan Arsip Kepegawaian',
                'description' => 'Ini adalah deskripsi untuk Pengelolaan Arsip Kepegawaian.',
            ],
            [
                'name' => 'Pengawasan dan Pengendalian',
                'description' => 'Ini adalah deskripsi untuk Pengawasan dan Pengendalian.',
            ],
            [
                'name' => 'Public Services',
                'description' => 'Ini adalah deskripsi untuk Public Services.',
            ],
            [
                'name' => 'Teknologi Informasi dan Komunikasi',
                'description' => 'Ini adalah deskripsi untuk Teknologi Informasi dan Komunikasi.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}