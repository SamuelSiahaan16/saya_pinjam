<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create(); 

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'username' => 'Admin',
            'roles_id' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'sam',
            'username' => 'sam',
            'email' => 'sam@gmail.com',
            'password' => Hash::make('password'),
        ]);


        $provinces = [
            'DKI Jakarta',
            'Jawa Barat',
            'Jawa Tengah',
            'Jawa Timur',
            'Bali',
            'Sumatera Selatan',
            'Riau',
            'Sumatera Utara',
        ];

        foreach ($provinces as $province) {
            DB::table('provinces')->insert([
                'name' => $province,
                'slug' => Str::slug($province),
            ]);
        }

        $cities = [
            ['name' => 'Jakarta', 'province' => 'DKI Jakarta'],

            // Jawa Barat
            ['name' => 'Bekasi', 'province' => 'Jawa Barat'],
            ['name' => 'Tanggerang', 'province' => 'Jawa Barat'],
            ['name' => 'Bogor', 'province' => 'Jawa Barat'],
            ['name' => 'Depok', 'province' => 'Jawa Barat'],
            ['name' => 'Karawang', 'province' => 'Jawa Barat'],
            ['name' => 'Purwakarta', 'province' => 'Jawa Barat'],
            ['name' => 'Subang', 'province' => 'Jawa Barat'],
            ['name' => 'Sukabumi', 'province' => 'Jawa Barat'],
            ['name' => 'Bandung', 'province' => 'Jawa Barat'],
            ['name' => 'Sumedang', 'province' => 'Jawa Barat'],
            ['name' => 'Tasikmalaya', 'province' => 'Jawa Barat'],
            ['name' => 'Garut', 'province' => 'Jawa Barat'],
            ['name' => 'Majalengka', 'province' => 'Jawa Barat'],
            ['name' => 'Kuningan', 'province' => 'Jawa Barat'],
            ['name' => 'Indramayu', 'province' => 'Jawa Barat'],
            ['name' => 'Cirebon', 'province' => 'Jawa Barat'],
            ['name' => 'Ciamis', 'province' => 'Jawa Barat'],
            ['name' => 'Cianjur', 'province' => 'Jawa Barat'],
            ['name' => 'Pangandaran', 'province' => 'Jawa Barat'],
            ['name' => 'Banjar', 'province' => 'Jawa Barat'],

            // Jawa Tengah
            ['name' => 'Semarang', 'province' => 'Jawa Tengah'],
            ['name' => 'Kendal', 'province' => 'Jawa Tengah'],

            // Jawa Timur
            ['name' => 'Surabaya', 'province' => 'Jawa Timur'],
            ['name' => 'Gresik', 'province' => 'Jawa Timur'],
            ['name' => 'Mojokerto', 'province' => 'Jawa Timur'],

            // Bali
            ['name' => 'Bali', 'province' => 'Bali'],

            // Sumatera Selatan
            ['name' => 'Palembang', 'province' => 'Sumatera Selatan'],

            // Riau
            ['name' => 'Pekanbaru', 'province' => 'Riau'],

            // Sumatera Utara
            ['name' => 'Medan', 'province' => 'Sumatera Utara'],
            ['name' => 'Deli Serdang', 'province' => 'Sumatera Utara'],
            ['name' => 'Asahan', 'province' => 'Sumatera Utara'],
            ['name' => 'Batu Bara', 'province' => 'Sumatera Utara'],
            ['name' => 'Dairi', 'province' => 'Sumatera Utara'],
            ['name' => 'Humbang Hasundutan', 'province' => 'Sumatera Utara'],
            ['name' => 'Karo', 'province' => 'Sumatera Utara'],
            ['name' => 'Labuhanbatu', 'province' => 'Sumatera Utara'],
            ['name' => 'Labuhanbatu Selatan', 'province' => 'Sumatera Utara'],
            ['name' => 'Langkat', 'province' => 'Sumatera Utara'],
            ['name' => 'Mandailing Natal', 'province' => 'Sumatera Utara'],
            ['name' => 'Padang Lawas', 'province' => 'Sumatera Utara'],
            ['name' => 'Padang Lawas Utara', 'province' => 'Sumatera Utara'],
            ['name' => 'Pakpak Bharat', 'province' => 'Sumatera Utara'],
            ['name' => 'Samosir', 'province' => 'Sumatera Utara'],
            ['name' => 'Serdang Bedagai', 'province' => 'Sumatera Utara'],
            ['name' => 'Simalungun', 'province' => 'Sumatera Utara'],
            ['name' => 'Tapanuli Selatan', 'province' => 'Sumatera Utara'],
            ['name' => 'Tapanuli Tengah', 'province' => 'Sumatera Utara'],
            ['name' => 'Tapanuli Utara', 'province' => 'Sumatera Utara'],
            ['name' => 'Toba', 'province' => 'Sumatera Utara'],
            ['name' => 'Binjai', 'province' => 'Sumatera Utara'],
            ['name' => 'Gunungsitoli', 'province' => 'Sumatera Utara'],
            ['name' => 'Padang Sidempuan', 'province' => 'Sumatera Utara'],
            ['name' => 'Pematang Siantar', 'province' => 'Sumatera Utara'],
            ['name' => 'Sibolga', 'province' => 'Sumatera Utara'],
            ['name' => 'Tanjungbalai', 'province' => 'Sumatera Utara'],
            ['name' => 'Tebing Tinggi', 'province' => 'Sumatera Utara'],
        ];

        foreach ($cities as $city) {
            $province_id = DB::table('provinces')->where('name', $city['province'])->value('id');
            DB::table('cities')->insert([
                'name' => $city['name'],
                'slug' => Str::slug($city['name']),
                'province_id' => $province_id,
            ]);
        }
    }
}