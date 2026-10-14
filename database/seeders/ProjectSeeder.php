<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Sistem Informasi Akademik',
                'description' => 'Aplikasi berbasis web untuk pengelolaan data akademik dan informasi mahasiswa secara terintegrasi.',
                'teknologi' => 'Laravel & Bootstrap',
                'image' => 'project1.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'E-commerce SEO Optimization',
                'description' => 'Aplikasi optimasi struktur heading dan indexing halaman web toko online agar lebih ramah mesin pencari.',
                'teknologi' => 'PHP & Google Search Console',
                'image' => 'project2.jpg',
                'status' => 'In Progress',
            ],
            [
                'title' => 'Redesign Cover dan Branding',
                'description' => 'Perancangan elemen grafis personal branding untuk media sosial dan portofolio digital.',
                'teknologi' => 'Figma & Canva',
                'image' => 'project3.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Portal Berita Mahasiswa',
                'description' => 'Aplikasi berbasis web untuk pengelolaan berita, agenda, dan informasi kampus untuk mahasiswa.',
                'teknologi' => 'HTML, CSS, JS & Bootstrap',
                'image' => 'project4.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Sistem Informasi Akademik',
                'description' => 'Aplikasi berbasis web untuk memudahkan pengelolaan data akademik, nilai, dan jadwal kuliah.',
                'teknologi' => 'Laravel & Bootstrap',
                'image' => 'project5.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Dashboard Monitoring Kampus',
                'description' => 'Dashboard untuk memantau aktivitas, data mahasiswa, dan progress program kampus secara real-time.',
                'teknologi' => 'Laravel & Chart.js',
                'image' => 'project6.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Marketplace Mahasiswa',
                'description' => 'Platform jual beli produk mahasiswa dan kegiatan komunitas berbasis website.',
                'teknologi' => 'PHP & Bootstrap',
                'image' => 'project7.jpg',
                'status' => 'In Progress',
            ],
            [
                'title' => 'Landing Page Startup',
                'description' => 'Desain landing page modern untuk memperkenalkan produk startup dan layanan digital.',
                'teknologi' => 'Figma & Web UI',
                'image' => 'project8.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Aplikasi Absensi Karyawan',
                'description' => 'Sistem absensi online untuk mencatat kehadiran dan data karyawan secara otomatis.',
                'teknologi' => 'Laravel & MySQL',
                'image' => 'project9.jpg',
                'status' => 'Selesai',
            ],
            [
                'title' => 'Portfolio Personal Website',
                'description' => 'Website portofolio pribadi untuk menampilkan karya, skill, dan pengalaman profesional.',
                'teknologi' => 'Laravel & Tailwind',
                'image' => 'project10.jpg',
                'status' => 'Selesai',
            ],
        ];

        foreach ($projects as $project) {
            \App\Models\Project::query()->updateOrCreate(
                ['title' => $project['title']],
                $project
            );
        }
    }
}