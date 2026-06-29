<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(BlogSeeder::class);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@fairitsolutions.ch'],
            [
                'name'     => 'FairIT Admin',
                'password' => Hash::make('change-this-password-immediately'),
                'is_admin' => true,
            ]
        );

        // Sample blog posts
        $posts = [
            [
                'title'       => 'The AI Transformation Playbook for SMEs in 2025',
                'excerpt'     => 'A practical guide for small and medium enterprises looking to unlock AI-driven growth without enterprise budgets.',
                'content'     => '<p>Artificial intelligence is no longer a luxury reserved for Fortune 500 companies. In 2025, SMEs that embrace AI transformation are out-competing larger rivals on speed, cost efficiency, and customer experience.</p><p>This playbook breaks down exactly how to approach AI transformation as a small or medium business...</p>',
                'category'    => 'AI for Business',
                'tags'        => 'AI, SME, transformation, strategy',
                'seo_title'   => 'AI Transformation Guide for SMEs 2025 | FairIT Solutions',
                'seo_desc'    => 'Practical AI transformation strategies for small and medium enterprises. Learn how to compete with AI without enterprise budgets.',
                'is_published'=> true,
                'published_at'=> now()->subDays(5),
            ],
            [
                'title'       => 'Voice AI: The Next Frontier for Customer Experience',
                'excerpt'     => 'How AI voice agents are revolutionising inbound sales, customer support, and booking automation across industries.',
                'content'     => '<p>Voice AI has crossed the uncanny valley. Modern AI voice agents sound indistinguishable from humans, handle complex multi-turn conversations, and operate at a fraction of the cost of human call centres...</p>',
                'category'    => 'Voice AI',
                'tags'        => 'Voice AI, automation, customer experience, sales',
                'seo_title'   => 'Voice AI for Business: Use Cases & ROI | FairIT Solutions',
                'seo_desc'    => 'Discover how AI voice agents are transforming customer experience, booking automation, and inbound sales for modern businesses.',
                'is_published'=> true,
                'published_at'=> now()->subDays(12),
            ],
            [
                'title'       => 'Why Every Founder Needs a Personal AI Operating System',
                'excerpt'     => 'The most ambitious founders in 2025 are not working harder — they are operating smarter with AI-powered decision systems.',
                'content'     => '<p>The best founders do not have more hours in the day. They have better systems. In 2025, the competitive advantage belongs to founders who have built AI operating systems that amplify their judgment, automate their operations, and free their attention for what matters most...</p>',
                'category'    => 'Founder Intelligence',
                'tags'        => 'founder, AI OS, productivity, startup',
                'seo_title'   => 'Founder AI Operating System: Build Your Competitive Edge | FairIT',
                'seo_desc'    => 'Why ambitious founders need a personal AI operating system in 2025. Learn how to build your AI advantage.',
                'is_published'=> true,
                'published_at'=> now()->subDays(20),
            ],
        ];

        foreach ($posts as $post) {
            Post::firstOrCreate(
                ['slug' => Str::slug($post['title'])],
                array_merge($post, ['author_id' => $admin->id, 'slug' => Str::slug($post['title'])])
            );
        }

        // Sample testimonials
        try {
            Testimonial::truncate();
        } catch (\Exception $e) {}

        $testimonials = [
            [
                'name'      => 'Dr. Sarah Jenkins',
                'role'      => 'Chief Medical Officer',
                'company'   => 'Callidus Health LLC',
                'content'     => 'CareLink transformed patient coordination for our care teams. Unifying EMR alerts and secure chat reduced response latency on critical signals while removing compliance-risky tools from our clinical workflows.',
                'rating'    => 5,
                'is_active' => true,
                'order'     => 1,
            ],
            [
                'name'      => 'Thomas Wright',
                'role'      => 'Head of Data Science',
                'company'   => 'CoreBrand Data Science LLC',
                'content'     => 'The custom SPSS visualization product turned complex statistical models into clear, decision-ready dashboards. Brand decisions that previously cycled for weeks now close in days.',
                'rating'    => 5,
                'is_active' => true,
                'order'     => 2,
            ],
            [
                'name'      => 'Rajesh Kumar',
                'role'      => 'Director of Urban Planning',
                'company'   => 'Madhya Pradesh Urban Ministry',
                'content'     => 'Moving Burhanpur and Khandwa from paper surveys to a single door-to-door GIS source of truth transformed our civic planning. It enabled property targeting that was previously impossible at scale.',
                'rating'    => 5,
                'is_active' => true,
                'order'     => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
