<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\IndustriesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

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

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit')->middleware('throttle:5,1');

// Consultation
Route::get('/book-consultation', [ConsultationController::class, 'index'])->name('consultation');
Route::post('/book-consultation', [ConsultationController::class, 'submit'])->name('consultation.submit')->middleware('throttle:3,1');

// Demo request (AJAX)
Route::post('/request-demo', [ContactController::class, 'demo'])->name('demo.submit')->middleware('throttle:3,1');

// AI Audit request
Route::post('/ai-audit', [ContactController::class, 'audit'])->name('audit.submit')->middleware('throttle:3,1');

// Legal pages
Route::view('/privacy-policy', 'legal.privacy')->name('privacy');
Route::view('/terms-of-service', 'legal.terms')->name('terms');
Route::view('/cookie-policy', 'legal.cookies')->name('cookies');

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

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

        // Consultations
        Route::get('/consultations', [LeadController::class, 'consultations'])->name('consultations.index');
    });
});
