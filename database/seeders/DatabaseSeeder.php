<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(BlogSeeder::class);
        $this->call(CaseStudySeeder::class);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@fairitsolutions.ch'],
            [
                'name' => 'FairIT Admin',
                'password' => Hash::make('change-this-password-immediately'),
                'is_admin' => true,
            ]
        );

        // Sample testimonials
        try {
            Testimonial::truncate();
        } catch (\Exception $e) {
        }

        $testimonials = [
            [
                'name' => 'Dr. Sarah Jenkins',
                'role' => 'Chief Medical Officer',
                'company' => 'A US healthcare provider',
                'content' => 'CareLink transformed patient coordination for our care teams. Unifying EMR alerts and secure chat reduced response latency on critical signals while removing compliance-risky tools from our clinical workflows.',
                'rating' => 5,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Thomas Wright',
                'role' => 'Head of Data Science',
                'company' => 'A data-science consultancy',
                'content' => 'The custom SPSS visualization product turned complex statistical models into clear, decision-ready dashboards. Brand decisions that previously cycled for weeks now close in days.',
                'rating' => 5,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Rajesh Kumar',
                'role' => 'Director of Urban Planning',
                'company' => 'A state urban-planning department',
                'content' => 'Moving two districts from paper surveys to a single door-to-door GIS source of truth transformed our civic planning. It enabled property targeting that was previously impossible at scale.',
                'rating' => 5,
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
