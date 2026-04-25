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
        $testimonials = [
            [
                'name'      => 'Rajiv Sharma',
                'role'      => 'CEO',
                'company'   => 'TechScale Ventures',
                'content'   => 'FairIT transformed how we operate. Our AI copilot handles 80% of internal queries — saving us 20+ hours per week. The ROI in month one paid for the entire engagement.',
                'rating'    => 5,
                'is_active' => true,
                'order'     => 1,
            ],
            [
                'name'      => 'Priya Mehta',
                'role'      => 'Operations Director',
                'company'   => 'Horizon Hospitality Group',
                'content'   => 'The voice AI they built for our booking line is incredible. Guests often do not realise they are talking to an AI. Bookings are up 34% and our team handles zero inbound calls.',
                'rating'    => 5,
                'is_active' => true,
                'order'     => 2,
            ],
            [
                'name'      => 'Marcus Klein',
                'role'      => 'Founder',
                'company'   => 'NextGen Properties',
                'content'   => 'The Founder Growth Advisory programme completely changed how I make decisions. I now have a system, not just a vision. Worth every franc.',
                'rating'    => 5,
                'is_active' => true,
                'order'     => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::firstOrCreate(['name' => $testimonial['name']], $testimonial);
        }
    }
}
