<?php $__env->startSection('title', 'About FairIT Solutions — AI Operating Systems for Growth, Homes & Life'); ?>
<?php $__env->startSection('description', 'FairIT Solutions builds AI systems that solve real-world complexity. We combine business understanding, engineering excellence, and product thinking to create AI that actually works.'); ?>

<?php $__env->startSection('content'); ?>

<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center">
        <div data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">About Us</span>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">We Build AI That<br>Actually Works</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
                FairIT Solutions builds AI systems that solve real-world complexity. We combine business understanding, engineering excellence, and product thinking to create AI that delivers measurable outcomes.
            </p>
        </div>
    </div>
</section>


<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-animate>
                <span class="section-label">Our Mission</span>
                <h2 class="text-4xl font-bold text-charcoal-950 mt-3 leading-tight">Democratising AI for Founders, Homes &amp; Life</h2>
                <div class="mt-8 space-y-5 text-charcoal-600 leading-relaxed">
                    <p>The most powerful AI systems in the world belong to a handful of trillion-dollar companies. We believe that should change.</p>
                    <p>FairIT Solutions was founded on a simple belief: that the intelligence of the best-run companies in the world should be accessible to every ambitious founder, every serious business, and every modern family — regardless of size, budget, or technical sophistication.</p>
                    <p>We build AI operating systems that give our clients the leverage, clarity, and execution velocity they need to compete at the highest level. Not just AI tools. Real systems that change how they operate every day.</p>
                </div>
            </div>
            <div data-animate data-animate-delay="200" class="grid grid-cols-2 gap-6">
                <?php $__currentLoopData = [
                    ['num' => '3', 'label' => 'AI Operating Systems built', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0'],
                    ['num' => '5', 'label' => 'Premium AI services', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944'],
                    ['num' => '8', 'label' => 'Industries served', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16'],
                    ['num' => '40+', 'label' => 'Languages supported', 'icon' => 'M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-charcoal-50 rounded-2xl p-6 text-center border border-charcoal-100">
                    <div class="text-4xl font-black text-charcoal-950 mb-1"><?php echo e($stat['num']); ?></div>
                    <div class="text-xs text-charcoal-500 font-medium"><?php echo e($stat['label']); ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>


<section class="section-padding bg-charcoal-50">
    <div class="container-wide">
        <div class="text-center mb-14" data-animate>
            <span class="section-label">Our Values</span>
            <h2 class="section-title mt-3">How We Work</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = [
                ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Outcomes First', 'desc' => 'We measure our success by your business results, not by the complexity of what we build.'],
                ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Speed & Precision', 'desc' => 'We move fast without compromising quality. Clarity of thought, precision of execution.'],
                ['icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'title' => 'Radical Transparency', 'desc' => 'We tell you what works, what does not, and why. No jargon, no obfuscation, no surprises.'],
                ['icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'title' => 'Long-Term Thinking', 'desc' => 'We build systems that last and relationships that compound. We care about your decade, not your quarter.'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div data-animate data-animate-delay="<?php echo e($i * 100); ?>" class="bg-white rounded-2xl p-6 border border-charcoal-100 text-center hover:shadow-card transition-all">
                <div class="w-12 h-12 rounded-xl bg-brand-50 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-6 h-6 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo e($value['icon']); ?>"/>
                    </svg>
                </div>
                <h3 class="font-bold text-charcoal-950 mb-2"><?php echo e($value['title']); ?></h3>
                <p class="text-charcoal-500 text-sm leading-relaxed"><?php echo e($value['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="section-padding bg-white">
    <div class="container-tight">
        <div class="text-center mb-12" data-animate>
            <span class="section-label">Our Approach</span>
            <h2 class="section-title mt-3">The FairIT Way</h2>
        </div>
        <div class="space-y-6">
            <?php $__currentLoopData = [
                ['step' => '01', 'title' => 'We Listen Before We Build', 'desc' => 'Every engagement starts with deep discovery. We invest time understanding your business, your people, your problems, and your ambitions before recommending a single solution.'],
                ['step' => '02', 'title' => 'We Engineer for Reality, Not Theory', 'desc' => 'AI systems fail when they are built for demos, not deployment. We design for the messy realities of how organisations actually work — integrations, exceptions, edge cases and all.'],
                ['step' => '03', 'title' => 'We Build for Adoption', 'desc' => 'The best AI system is the one your team actually uses. We design with change management in mind, running onboarding, training, and feedback loops to ensure real adoption.'],
                ['step' => '04', 'title' => 'We Measure What Matters', 'desc' => 'Every engagement has clear success metrics defined upfront. We track, report, and optimise relentlessly so you always know the ROI of your AI investment.'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div data-animate class="flex items-start gap-6 p-6 rounded-2xl hover:bg-charcoal-50 transition-colors">
                <div class="w-14 h-14 rounded-2xl bg-charcoal-950 text-white flex items-center justify-center font-black text-lg flex-shrink-0"><?php echo e($item['step']); ?></div>
                <div>
                    <h3 class="text-lg font-bold text-charcoal-950 mb-2"><?php echo e($item['title']); ?></h3>
                    <p class="text-charcoal-600 leading-relaxed"><?php echo e($item['desc']); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">Ready to Work Together?</h2>
        <p class="text-charcoal-400 mb-8">Let's start with a conversation about your biggest AI opportunity.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route('consultation')); ?>" class="btn-primary-lg">Book a Consultation</a>
            <a href="<?php echo e(route('contact')); ?>" class="btn-outline-white">Contact Us</a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mayuresh/Projects/Nishant-Dada/FairIT Solutions/FairITSolutions Website/resources/views/about.blade.php ENDPATH**/ ?>