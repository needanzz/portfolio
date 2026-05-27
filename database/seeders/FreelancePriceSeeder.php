<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FreelancePrice;

class FreelancePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FreelancePrice::truncate();

        FreelancePrice::create([
            'service_name_id' => 'Paket Website & Sistem Bisnis Dasar',
            'service_name_en' => 'Starter Web & Business System',
            'description_id' => 'Sangat cocok untuk website profil perusahaan, halaman promosi produk, atau sistem pencatatan data sederhana agar bisnis Anda terlihat lebih profesional dan tepercaya secara online.',
            'description_en' => 'Perfect for company profile websites, product landing pages, or basic record-keeping systems to build trust and display your business professionally online.',
            'features_id' => [
                'Desain Modern & Rapi (Tampilan Sempurna di HP, Tablet & Laptop)',
                'Halaman Utama Menarik + Profil Lengkap Bisnis Anda',
                'Sistem Kelola Data Sederhana (Hingga 3 Jenis Pencatatan Data)',
                'Formulir Hubungi Kami Langsung Masuk ke Email Anda',
                'Website Cepat Diakses & Mudah Ditemukan di Google (SEO Dasar)',
                'Garansi Perbaikan & Pendampingan Teknis Gratis 1 Bulan',
            ],
            'features_en' => [
                'Modern & Clean Design (Optimized for Mobile, Tablets & Laptops)',
                'Engaging Homepage + Complete Business Profile',
                'Simple Data Record Management (Up to 3 data types)',
                'Automated Contact Form Sent Straight to Your Email',
                'Basic SEO Setup for Visibility on Google Search',
                '1-Month Free Technical Support & Bug Warranty',
            ],
            'price_start' => 2500000,
            'is_active' => true,
            'order' => 1,
        ]);

        FreelancePrice::create([
            'service_name_id' => 'Paket Sistem Bisnis Profesional',
            'service_name_en' => 'Professional Business System',
            'description_id' => 'Solusi lengkap dengan dasbor khusus untuk mengelola data bisnis Anda, membuat laporan otomatis, grafik analisis penjualan, dan sistem hak akses karyawan yang aman.',
            'description_en' => 'A comprehensive dashboard custom-made to manage your business operations, view sales charts, generate automated reports, and manage secure employee roles.',
            'features_id' => [
                'Semua Keuntungan dari Paket Dasar',
                'Sistem Akun Karyawan & Pelanggan dengan Batasan Akses Aman',
                'Dasbor dengan Grafik Visual untuk Memantau Perkembangan Bisnis',
                'Penyimpanan Data Terpusat (Menghubungkan Hingga 10 Jenis Data)',
                'Cetak Laporan Penjualan/Kinerja ke File Excel & PDF dengan 1 Klik',
                'Fitur Pencarian dan Filter Data yang Sangat Cepat Tanpa Loading Lama',
                'Garansi Perbaikan & Pendampingan Teknis Gratis 3 Bulan',
            ],
            'features_en' => [
                'All Included Benefits from the Starter Package',
                'Secure Multi-User Portal for Staff & Customers',
                'Interactive Dashboards with Visual Progress Charts',
                'Robust Central Database (Connecting up to 10 data categories)',
                'One-Click PDF & Excel Exporting for Performance Reports',
                'Lightning-Fast Instant Search & Sorting Tools',
                '3-Months Free Technical Support & Bug Warranty',
            ],
            'price_start' => 7500000,
            'is_active' => true,
            'order' => 2,
        ]);

        FreelancePrice::create([
            'service_name_id' => 'Paket Sistem Kustom Skala Besar',
            'service_name_en' => 'Custom Enterprise System',
            'description_id' => 'Sistem kustom super lengkap yang dirancang khusus untuk mengotomatiskan seluruh alur kerja bisnis Anda yang rumit, terintegrasi dengan sistem luar (seperti pembayaran online otomatis), serta keamanan data super ketat.',
            'description_en' => 'A fully customized digital workspace to automate complex day-to-day operations, integrate external applications (like automatic e-payments), and apply high-security lockouts.',
            'features_id' => [
                'Semua Keuntungan dari Paket Profesional',
                'Kapasitas Penyimpanan Data Kustom Tanpa Batasan Jumlah Data',
                'Sistem Otomatisasi Alur Kerja (Mengurangi Tugas Manual Karyawan)',
                'Terintegrasi Pembayaran Online Otomatis & Layanan Ekspedisi',
                'Catatan Aktivitas Karyawan (Memantau Siapa yang Mengubah Data)',
                'Pencadangan Data Otomatis Setiap Hari Agar Aman dari Kehilangan Data',
                'Optimasi Kecepatan Maksimal & Proteksi Keamanan Tingkat Tinggi',
                'Garansi Perbaikan Gratis & Prioritas Bantuan Teknis Selama 6 Bulan',
            ],
            'features_en' => [
                'All Included Benefits from the Professional Package',
                'Unlimited Database Capacity Custom Built for Your Scale',
                'Workflow Automation to Save Staff Hours & Prevent Human Errors',
                'Automatic Online Payment & Courier Shipping Gateways',
                'Detailed Action History Log to Track and Audit System Changes',
                'Automated Daily Backups to Secure Against Any Data Loss',
                'Premium Server Speed Tuning & High-Level SSL Protections',
                '6-Months Priority Technical Assistance & Lifetime Security Advice',
            ],
            'price_start' => 15000000,
            'is_active' => true,
            'order' => 3,
        ]);
    }
}
