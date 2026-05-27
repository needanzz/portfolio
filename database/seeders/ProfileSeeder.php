<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\Experience;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Seed Site Settings
        $settings = [
            'full_name' => 'Muhammad Danil Aminuddin',
            'tagline' => 'Professional Web Developer & Business System Specialist',
            'bio_id' => 'Saya adalah seorang pembuat website dan sistem digital profesional yang berfokus membantu pemilik bisnis mempermudah pekerjaan mereka. Saya menggabungkan pemahaman mendalam tentang cara kerja bisnis dengan keahlian teknis modern untuk menciptakan aplikasi atau website yang mudah digunakan oleh siapa saja, bahkan untuk orang yang kurang memahami teknologi sekalipun.',
            'bio_en' => 'I am a professional web developer focused on helping business owners simplify their daily operations. I combine a deep understanding of business processes with modern tech skills to create applications and websites that are incredibly easy for anyone to use, even those with zero technical background.',
            'social_github' => 'https://github.com/DanilAminuddin',
            'social_linkedin' => 'https://linkedin.com/in/danilaminuddin',
            'social_instagram' => 'https://instagram.com/danilaminuddin',
            'social_email' => 'danilaminuddin@example.com',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // 2. Seed Education Timelines
        $education = [
            [
                'company' => 'Universitas Dinamika (STIKOM Surabaya)',
                'position' => 'S1 Sistem Informasi',
                'start_date' => '2021-09-01',
                'end_date' => '2025-08-30',
                'description' => 'Mendalami cara membangun sistem digital bisnis, merancang database yang aman, menganalisis kebutuhan operasional perusahaan, serta cara mengelola proyek pembuatan aplikasi secara cepat dan efisien.',
                'type' => 'education',
            ],
            [
                'company' => 'SMK Negeri 1 Surabaya',
                'position' => 'Rekayasa Perangkat Lunak (RPL)',
                'start_date' => '2018-07-15',
                'end_date' => '2021-06-20',
                'description' => 'Mempelajari dasar-dasar pembuatan website dinamis, pengelolaan penyimpanan data (database), serta cara kerja server lokal dan jaringan komputer.',
                'type' => 'education',
            ]
        ];

        foreach ($education as $item) {
            Experience::updateOrCreate(
                [
                    'company' => $item['company'],
                    'position' => $item['position']
                ],
                [
                    'start_date' => $item['start_date'],
                    'end_date' => $item['end_date'],
                    'description' => $item['description'],
                    'type' => $item['type'],
                ]
            );
        }

        // 3. Seed Work Experiences
        $work = [
            [
                'company' => 'PT. Digital Nusantara',
                'position' => 'Junior Full Stack Web Developer',
                'start_date' => '2024-07-01',
                'end_date' => null,
                'description' => 'Membangun sistem kelola data internal perusahaan agar pekerjaan karyawan lebih cepat. Mengintegrasikan sistem pembayaran otomatis agar bisnis klien bisa menerima pembayaran online secara otomatis (seperti transfer bank dan e-wallet), serta memastikan website memuat data dalam hitungan detik.',
                'type' => 'work',
            ],
            [
                'company' => 'CV. Techno Solution Surabaya',
                'position' => 'Web Developer Intern',
                'start_date' => '2023-02-01',
                'end_date' => '2023-06-30',
                'description' => 'Membantu merancang struktur penyimpanan data yang aman, membuat aplikasi pencatatan keluar-masuk stok barang, serta laporan keuangan kas masuk dan keluar secara otomatis.',
                'type' => 'work',
            ]
        ];

        foreach ($work as $item) {
            Experience::updateOrCreate(
                [
                    'company' => $item['company'],
                    'position' => $item['position']
                ],
                [
                    'start_date' => $item['start_date'],
                    'end_date' => $item['end_date'],
                    'description' => $item['description'],
                    'type' => $item['type'],
                ]
            );
        }
    }
}
