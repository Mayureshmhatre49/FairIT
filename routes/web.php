<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CaseStudiesController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Language switcher
Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['en', 'de', 'fr'])) {
        session(['locale' => $locale]);
    }

    return redirect()->back()->withInput();
})->name('lang.switch');

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Services
Route::get('/services', [ServicesController::class, 'index'])->name('services.index');
Route::get('/services/ai-transformation-advisory', [ServicesController::class, 'advisory'])->name('services.advisory');
Route::get('/services/custom-ai-copilot-development', [ServicesController::class, 'copilot'])->name('services.copilot');
Route::get('/services/voice-ai-conversational-automation', [ServicesController::class, 'voiceai'])->name('services.voiceai');
Route::get('/services/managed-ai-retainers', [ServicesController::class, 'retainers'])->name('services.retainers');
Route::get('/services/founder-growth-advisory', [ServicesController::class, 'founder'])->name('services.founder');

// Products
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/sarathios', [ProductsController::class, 'sarathios'])->name('products.sarathios');
Route::get('/products/hsi-os', [ProductsController::class, 'hsios'])->name('products.hsios');
Route::get('/products/handlelife-os', [ProductsController::class, 'handlelife'])->name('products.handlelife');

// Industries
Route::get('/industries', [IndustriesController::class, 'index'])->name('industries.index');
Route::get('/industries/{slug}', [IndustriesController::class, 'show'])->name('industries.show');

// About
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Blog / Insights
Route::get('/insights', [BlogController::class, 'index'])->name('blog.index');
Route::get('/insights/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Case Studies
Route::get('/case-studies', [CaseStudiesController::class, 'index'])->name('case-studies.index');
Route::redirect('/case-studies/velir', '/case-studies/sitecore-qa-confidential', 301);
Route::redirect('/case-studies/corebrand-data-science-product', '/case-studies/spss-analytics-visualisation-product', 301);
Route::redirect('/case-studies/cipla-calendar', '/case-studies/field-force-engagement-calendar', 301);
Route::redirect('/case-studies/cipla-ar', '/case-studies/medical-device-ar-storytelling', 301);
Route::redirect('/case-studies/cipla-smart-inhaler', '/case-studies/connected-smart-inhaler-app', 301);
Route::redirect('/case-studies/roomstays', '/case-studies/b2c-hotel-discovery-platform', 301);
Route::redirect('/case-studies/exide', '/case-studies/iot-theft-prevention-tracking', 301);
Route::redirect('/case-studies/vehicletrx', '/case-studies/auto-body-shop-tracking-platform', 301);
Route::redirect('/case-studies/panajoy', '/case-studies/manufacturing-erp-packing-controls', 301);
Route::redirect('/case-studies/cityhopz', '/case-studies/real-time-bar-hopping-app', 301);
Route::redirect('/case-studies/hawkvue', '/case-studies/critical-plant-monitoring-forensic-video', 301);
Route::redirect('/case-studies/mobijot', '/case-studies/frictionless-mobile-capture-app', 301);
Route::redirect('/case-studies/worldcourts', '/case-studies/global-supreme-court-verdict-search', 301);
Route::redirect('/case-studies/arthaenterprises', '/case-studies/agritech-ecosystem-logistics', 301);
Route::redirect('/case-studies/mapro-ecommerce', '/case-studies/fmcg-dtc-ecommerce', 301);
Route::redirect('/case-studies/piaggio', '/case-studies/corporate-cms-website', 301);
Route::redirect('/case-studies/vocalbee', '/case-studies/visual-content-analytics-platform', 301);
Route::redirect('/case-studies/zeal', '/case-studies/agritech-ecosystem-diagnostics', 301);
Route::redirect('/case-studies/cipla-gamingportal', '/case-studies/gamified-sales-learning-portal', 301);
Route::redirect('/case-studies/the-lift', '/case-studies/production-erp-film-content', 301);
Route::get('/case-studies/{slug}', [CaseStudiesController::class, 'show'])->name('case-studies.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit')->middleware('throttle:5,1');

// Consultation
Route::get('/book-consultation', [ConsultationController::class, 'index'])->name('consultation');
Route::post('/book-consultation', [ConsultationController::class, 'submit'])->name('consultation.submit')->middleware('throttle:3,1');

// Demo request (AJAX)
Route::post('/request-demo', [ContactController::class, 'demo'])->name('demo.submit')->middleware('throttle:3,1');
Route::post('/join-waitlist', [ContactController::class, 'waitlist'])->name('waitlist.submit')->middleware('throttle:5,1');

// AI Audit request
Route::post('/ai-audit', [ContactController::class, 'audit'])->name('audit.submit')->middleware('throttle:3,1');

// Legal pages
Route::view('/privacy-policy', 'legal.privacy')->name('privacy');
Route::view('/terms-of-service', 'legal.terms')->name('terms');
Route::view('/cookie-policy', 'legal.cookies')->name('cookies');

// SEO discovery endpoints
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/sitemap-index.xml', [SitemapController::class, 'sitemapIndex'])->name('sitemap.index');
Route::get('/sitemap-news.xml', [SitemapController::class, 'news'])->name('sitemap.news');
Route::get('/feed.xml', [SitemapController::class, 'feed'])->name('feed');
Route::get('/rss', [SitemapController::class, 'feed']);

// ============================================================
// Admin routes — hidden prefix
// ============================================================
Route::prefix('x-admin-secure-2024')->name('admin.')->group(function () {

    // Auth
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('throttle:5,1');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin area
    Route::middleware(['admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Blog Posts
        Route::resource('posts', PostController::class);

        // Leads
        Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
        Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
        Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.status');
        Route::delete('/leads/{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');

        // Testimonials
        Route::resource('testimonials', TestimonialController::class);

        // Case Studies
        Route::resource('case-studies', CaseStudyController::class)
            ->parameters(['case-studies' => 'caseStudy'])
            ->except(['show']);

        // Consultations
        Route::get('/consultations', [LeadController::class, 'consultations'])->name('consultations.index');
    });
});
