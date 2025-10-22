<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Content;
use App\Models\Service;
use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@webtech.test',
            'password' => Hash::make('password'),
        ]);

        // Create Contents
        Content::create([
            'section' => 'hero',
            'title' => 'Welcome to PT Sinar WebTech',
            'body' => 'Your Trusted Partner in Digital Transformation and Web Solutions',
        ]);

        Content::create([
            'section' => 'about',
            'title' => 'About PT Sinar WebTech',
            'body' => 'PT Sinar WebTech adalah perusahaan teknologi terkemuka yang berfokus pada pengembangan solusi web dan transformasi digital. Dengan pengalaman lebih dari 10 tahun, kami telah melayani ratusan klien dari berbagai industri. Tim kami terdiri dari profesional berpengalaman yang berkomitmen memberikan solusi terbaik untuk bisnis Anda.',
        ]);

        Content::create([
            'section' => 'footer',
            'title' => 'PT Sinar WebTech',
            'body' => 'Jl. Teknologi No. 123, Jakarta Selatan, Indonesia. Phone: +62 21 1234 5678. Email: info@webtech.test',
        ]);

        // Create Services
        $services = [
            [
                'title' => 'Web Development',
                'description' => 'Kami menyediakan layanan pengembangan website profesional dengan teknologi terkini seperti Laravel, React, dan Vue.js. Solusi yang kami tawarkan scalable, secure, dan user-friendly.',
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Kembangkan aplikasi mobile Android dan iOS dengan tim developer berpengalaman. Kami menggunakan Flutter dan React Native untuk memberikan performa terbaik.',
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Tingkatkan visibilitas bisnis Anda dengan strategi digital marketing yang tepat. Kami ahli dalam SEO, SEM, social media marketing, dan content marketing.',
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Desain interface yang menarik dan user experience yang optimal. Tim designer kami akan membantu menciptakan produk digital yang engaging dan mudah digunakan.',
            ],
            [
                'title' => 'Cloud Solutions',
                'description' => 'Migrasi dan pengelolaan infrastruktur cloud untuk meningkatkan efisiensi dan skalabilitas bisnis. Kami mendukung AWS, Google Cloud, dan Azure.',
            ],
            [
                'title' => 'IT Consulting',
                'description' => 'Konsultasi teknologi untuk membantu bisnis Anda membuat keputusan strategis. Kami memberikan insight dan rekomendasi berdasarkan best practice industri.',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Create Gallery
        $galleries = [
            ['title' => 'Office Building'],
            ['title' => 'Team Meeting'],
            ['title' => 'Workspace'],
            ['title' => 'Client Presentation'],
            ['title' => 'Development Team'],
            ['title' => 'Company Event'],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create([
                'title' => $gallery['title'],
                'image' => 'https://via.placeholder.com/600x400?text=' . urlencode($gallery['title']),
            ]);
        }
    }
}