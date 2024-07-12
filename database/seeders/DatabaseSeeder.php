<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Jenis_usaha;
use App\Models\Klasifikasi_usaha;
use App\Models\Benefit;
use App\Models\User;
use App\Models\Berita;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Berita::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::create([
            'name' => 'endian',
            'username' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'image' => '2024-04-29-profile.png',
            'password' => Hash::make('12345') 
        ]);

        Jenis_usaha::create([
            'name' => 'Hotel'
        ]);

        Jenis_usaha::create([
            'name' => 'Restoran'
        ]);
        
        Jenis_usaha::create([
            'name' => 'Affiliasi Serikat'
        ]);
        
        Jenis_usaha::create([
            'name' => 'Affiliasi Gabungan'
        ]);

        Klasifikasi_usaha::create([
            'name' => 'Hotel'
        ]);

        Klasifikasi_usaha::create([
            'name' => 'Restoran'
        ]);

        Benefit::create([
            'name' => 'Button Panic'
        ]);
        
        Benefit::create([
            'name' => 'Bantuan Hukum'
        ]);
        
        Benefit::create([
            'name' => 'Bantuan Kelistrikan'
        ]);

        Benefit::create([
            'name' => 'Sertifikasi Halal'
        ]);

        Benefit::create([
            'name' => 'Suplier'
        ]);

        Benefit::create([
            'name' => 'Design Interior'
        ]);

        Benefit::create([
            'name' => 'Diskon Pengiriman'
        ]);

        Benefit::create([
            'name' => 'Bantuan Perizinan OSS'
        ]);

        Benefit::create([
            'name' => 'Konsultan Perbankan'
        ]);
    }
}
