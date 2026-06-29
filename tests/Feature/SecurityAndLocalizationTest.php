<?php

namespace Tests\Feature;

use Tests\TestCase;

class SecurityAndLocalizationTest extends TestCase
{
    /** @test */
    public function test_homepage_loads_with_security_headers()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertHeader('X-Frame-Options', 'DENY');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->assertHeader('Content-Security-Policy');
    }

    /** @test */
    public function test_language_switcher_sets_session_and_redirects()
    {
        $response = $this->get('/lang/de');

        $response->assertRedirect();
        $this->assertEquals('de', session('locale'));

        // Test that unsupported languages are not set in the session
        $response2 = $this->get('/lang/es');
        $response2->assertRedirect();
        $this->assertNotEquals('es', session('locale'));
    }

    /** @test */
    public function test_sitemap_xml_loads_successfully()
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
    }

    /** @test */
    public function test_rss_feed_xml_loads_successfully()
    {
        $response = $this->get('/feed.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/rss+xml; charset=UTF-8');
    }
}
