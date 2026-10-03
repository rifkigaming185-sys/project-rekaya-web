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
                'description' => 'Aplikasi berbasis web untuk pengelolaan',
                'teknologi' => 'laravel &  Bootstrap',
                'image' => 'project1.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'E-commerce SEO Optimization',
                'description' => 'Aplikasi optimasi struktur heading dan indexing halaman web toko online',
                'teknologi' => 'PHP & Google Search Console',
                'image' => 'project2.jpg',
                'status' => 'In Progress',
            ],
            [
                'title' => 'Redesign COver dan branding',
                'description' => 'Perancangan element grafis personal  branding untuk media sosial dan portofolio',
                'teknologi' => 'Figma & Canva',
                'image' => 'project3.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'Portal Berita Mahasiswa',
                'description' => 'Aplikasi berbasis web untuk pengelolaan berita dan informasi mahasiswa',
                'teknologi' => 'HTML, CSS, JS & Bootstrap',
                'image' => 'project4.jpg',
                'status' => 'selesai',
            ],
            [
                'title' => 'Sistem Informasi Akademik',
                'description' => 'Aplikasi berbasis web untuk pengelolaan',
                'teknologi' => 'laravel &  Bootstrap',
                'image' => 'project5.jpg',
                'status' => 'selesai',
            ],
        ];
        foreach ($projects as $project) {
            \App\Models\Project::create($project);
        }
        //
    }
}