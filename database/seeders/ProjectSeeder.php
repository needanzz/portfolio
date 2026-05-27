<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title_id' => 'IS-Library (Sistem Perpustakaan Digital)',
                'title_en' => 'IS-Library (Digital Library System)',
                'description_id' => 'Website pengelolaan perpustakaan digital untuk mempermudah pencatatan pinjam-kembali buku, perhitungan denda keterlambatan secara otomatis, pencarian buku yang cepat, serta cetak laporan bulanan secara instan.',
                'description_en' => 'A digital library website that simplifies tracking book loans and returns, automatically calculates late fees, enables fast catalog searches, and generates instant monthly reports.',
                'category' => 'Web',
                'tech_stack' => ['Laravel 11', 'Bootstrap 5', 'MySQL', 'Livewire', 'Alpine.js'],
                'thumbnail' => null, // will fall back to dynamic SVG/gradient
                'demo_url' => 'https://library.danilaminuddin.my.id',
                'repo_url' => 'https://github.com/danilaminuddin/is-library',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title_id' => 'IS-Clinic (Aplikasi Manajemen Klinik)',
                'title_en' => 'IS-Clinic (Clinic Management App)',
                'description_id' => 'Aplikasi manajemen klinik terintegrasi untuk membantu pendaftaran pasien secara digital, pengisian riwayat berobat pasien secara aman, pembuatan resep obat, pencetakan kuitansi otomatis, dan grafik laporan penyakit terlaris tiap bulan.',
                'description_en' => 'An integrated clinic management app that digitizes patient registration, secures medical history records, manages prescriptions, automates billing invoices, and generates monthly health reports.',
                'category' => 'Web',
                'tech_stack' => ['Laravel 10', 'Bootstrap 5', 'MySQL', 'Chart.js', 'Dompdf'],
                'thumbnail' => null,
                'demo_url' => 'https://clinic.danilaminuddin.my.id',
                'repo_url' => 'https://github.com/danilaminuddin/is-clinic',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title_id' => 'IS-Asset (Sistem Pencatatan Barang & Aset)',
                'title_en' => 'IS-Asset (Asset & Inventory Tracker)',
                'description_id' => 'Sistem pencatatan barang berharga (aset) perusahaan untuk menghitung penurunan nilai barang secara otomatis setiap tahunnya, pengingat jadwal servis berkala, dan pelacakan barang secara praktis menggunakan scan kode QR.',
                'description_en' => 'A corporate asset inventory system that automatically calculates annual asset value depreciation, schedules maintenance alerts, and enables easy asset tracking using QR codes.',
                'category' => 'Web',
                'tech_stack' => ['Laravel 11', 'Bootstrap 5', 'PostgreSQL', 'Alpine.js', 'QR Code Generator'],
                'thumbnail' => null,
                'demo_url' => null,
                'repo_url' => 'https://github.com/danilaminuddin/is-asset',
                'is_featured' => false,
                'order' => 3,
            ],
            [
                'title_id' => 'IS-MobileAttendance (Absensi GPS Karyawan)',
                'title_en' => 'IS-MobileAttendance (GPS Employee Attendance)',
                'description_id' => 'Aplikasi absensi karyawan di handphone berbasis lokasi GPS akurat (karyawan hanya bisa absen jika berada di area kantor) dilengkapi dengan foto selfie pencocokan wajah untuk mencegah kecurangan.',
                'description_en' => 'A mobile attendance app for employees using highly accurate GPS tracking (ensures check-ins only happen at the office) with facial recognition selfie validation to prevent cheating.',
                'category' => 'Mobile',
                'tech_stack' => ['Flutter', 'Firebase', 'REST API', 'Laravel 10', 'Google Maps API'],
                'thumbnail' => null,
                'demo_url' => null,
                'repo_url' => 'https://github.com/danilaminuddin/is-mobile-attendance',
                'is_featured' => true,
                'order' => 4,
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
