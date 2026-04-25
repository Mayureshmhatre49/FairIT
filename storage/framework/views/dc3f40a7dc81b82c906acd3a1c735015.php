<?php $__env->startSection('title', 'SarathiOS — Founder AI Operating System | FairIT Solutions'); ?>
<?php $__env->startSection('description', 'SarathiOS is the AI operating system for startup founders and CEOs. Growth command centre, AI copilot, decision support, team alignment, and fundraising readiness in one intelligent system.'); ?>
<?php $__env->startSection('keywords', 'founder AI, startup AI tools, CEO operating system, AI for founders, startup productivity'); ?>

<?php $__env->startSection('content'); ?>

<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.2) 0%, transparent 70%);"></div>
    <div class="relative container-tight">
        <div data-animate class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
            <div class="flex-1">
                <a href="<?php echo e(route('products.index')); ?>" class="inline-flex items-center gap-2 text-charcoal-400 hover:text-white text-sm mb-8 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                    All Products
                </a>
                <span class="badge bg-brand-600/20 text-brand-300 border-brand-500/20 mb-4">Founder OS</span>
                <h1 class="text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">SarathiOS</h1>
                <p class="text-brand-300 text-xl font-medium italic mb-6">The AI Operating System for founders who refuse to move slowly.</p>
                <p class="text-charcoal-300 text-lg leading-relaxed max-w-xl mb-10">
                    From your morning priorities to your quarterly strategy, SarathiOS gives founders the intelligence, clarity, and leverage to build at velocity.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?php echo e(route('consultation')); ?>" class="btn-primary-lg">Get Early Access</a>
                    <a href="<?php echo e(route('contact')); ?>" class="btn-outline-white">Request Demo</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-padding bg-charcoal-950">
    <div class="container-wide">
        <div class="text-center mb-14" data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">Core Modules</span>
            <h2 class="text-4xl font-bold text-white mt-3">Your Complete Founder OS</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $modules = [
                ['icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'title' => 'Founder Dashboard', 'desc' => 'Your daily command centre. Revenue, pipeline, team health, and key metrics — in one view that actually tells you what matters.'],
                ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Growth Command Centre', 'desc' => 'AI-driven growth intelligence. Identify your highest-leverage opportunities and track execution against your growth plan.'],
                ['icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0', 'title' => 'AI Strategy Copilot', 'desc' => 'Your 24/7 strategic advisor. Ask questions, model scenarios, stress-test decisions, and get board-quality answers instantly.'],
                ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Decision Support Engine', 'desc' => 'Stop second-guessing. The Decision Engine surfaces relevant data, patterns, and frameworks to support every major decision.'],
                ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Team Alignment Tools', 'desc' => 'Keep your team aligned to your vision. Pulse checks, OKR tracking, and communication intelligence built for founders.'],
                ['icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 0V4m0 3L7 8m5 0l5 1', 'title' => 'Fundraising Readiness', 'desc' => 'Investor-grade reporting, data room management, metrics storytelling, and due diligence preparation — automated.'],
            ]; ?>

            <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div data-animate data-animate-delay="<?php echo e($loop->index * 100); ?>" class="bg-white/5 hover:bg-white/8 border border-white/10 hover:border-brand-500/30 rounded-2xl p-6 transition-all duration-300 group">
                <div class="w-11 h-11 rounded-xl bg-brand-600/20 flex items-center justify-center mb-5 group-hover:bg-brand-600/30 transition-colors">
                    <svg class="w-5.5 h-5.5 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo e($module['icon']); ?>"/>
                    </svg>
                </div>
                <h3 class="font-bold text-white mb-2"><?php echo e($module['title']); ?></h3>
                <p class="text-charcoal-400 text-sm leading-relaxed"><?php echo e($module['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-animate>
                <span class="section-label">Built For</span>
                <h2 class="section-title mt-3">Who Uses SarathiOS?</h2>
                <div class="mt-8 space-y-6">
                    <?php $__currentLoopData = [
                        ['Startup Founders', 'Seed to Series B founders who need leverage without headcount.'],
                        ['CEOs & MDs', 'Business owners who want executive intelligence without executive overhead.'],
                        ['Growth Leaders', 'Revenue and growth leads who need to move fast on the right bets.'],
                        ['Solo Operators', 'One-person businesses that need a 10-person team\'s capability.'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $who): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-brand-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div>
                            <div class="font-bold text-charcoal-950 mb-1"><?php echo e($who[0]); ?></div>
                            <p class="text-charcoal-500 text-sm"><?php echo e($who[1]); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div data-animate data-animate-delay="200" class="bg-charcoal-50 rounded-2xl p-8 border border-charcoal-100">
                <h3 class="text-xl font-bold text-charcoal-950 mb-6">Get Early Access</h3>
                <form action="<?php echo e(route('consultation')); ?>" method="GET">
                    <div class="space-y-4">
                        <div>
                            <label class="form-label">Your Name</label>
                            <input type="text" placeholder="e.g. Rajiv Sharma" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">Work Email</label>
                            <input type="email" placeholder="rajiv@company.com" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">Company Stage</label>
                            <select class="form-input">
                                <option>Pre-seed / Idea stage</option>
                                <option>Seed</option>
                                <option>Series A/B</option>
                                <option>Bootstrapped SME</option>
                                <option>Enterprise</option>
                            </select>
                        </div>
                        <a href="<?php echo e(route('consultation')); ?>" class="btn-primary w-full justify-center mt-2">Request Early Access</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">Ready to Operate Like a $10M Company?</h2>
        <p class="text-charcoal-400 mb-8">Join the waitlist for SarathiOS early access.</p>
        <a href="<?php echo e(route('consultation')); ?>" class="btn-primary-lg">Get Early Access</a>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mayuresh/Projects/Nishant-Dada/FairIT Solutions/FairITSolutions Website/resources/views/products/sarathios.blade.php ENDPATH**/ ?>