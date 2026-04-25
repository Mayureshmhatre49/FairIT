<?php $__env->startSection('title', $service['title'] . ' — FairIT Solutions'); ?>
<?php $__env->startSection('description', $service['description']); ?>

<?php $__env->startSection('schema'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "provider": { "@type": "Organization", "name": "FairIT Solutions", "url": "https://fairitsolutions.ch" },
    "name": "<?php echo e($service['title']); ?>",
    "description": "<?php echo e($service['description']); ?>"
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative bg-charcoal-950 pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 50% 60% at 50% 0%, rgba(37,99,235,0.15) 0%, transparent 70%);"></div>
    <div class="relative container-tight">
        <div data-animate>
            <a href="<?php echo e(route('services.index')); ?>" class="inline-flex items-center gap-2 text-charcoal-400 hover:text-white text-sm mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                All Services
            </a>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest block mb-3">Service</span>
            <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold text-white leading-tight mb-6"><?php echo e($service['title']); ?></h1>
            <p class="text-charcoal-300 text-xl font-medium italic mb-6"><?php echo e($service['tagline']); ?></p>
            <p class="text-charcoal-400 text-lg leading-relaxed max-w-2xl"><?php echo e($service['description']); ?></p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <a href="<?php echo e(route($service['cta_route'])); ?>" class="btn-primary-lg">
                    <?php echo e($service['cta_text']); ?>

                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="<?php echo e(route('contact')); ?>" class="btn-outline-white">Ask a Question</a>
            </div>
        </div>
    </div>
</section>


<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">

            
            <div data-animate>
                <h2 class="text-2xl font-bold text-charcoal-950 mb-8">What You Get</h2>
                <div class="space-y-4">
                    <?php $__currentLoopData = $service['benefits']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-charcoal-50 transition-colors">
                        <div class="w-8 h-8 rounded-full bg-brand-100 flex items-center justify-center flex-shrink-0 text-sm font-bold text-brand-700"><?php echo e($i + 1); ?></div>
                        <p class="text-charcoal-700 pt-1"><?php echo e($benefit); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div data-animate data-animate-delay="200">
                <h2 class="text-2xl font-bold text-charcoal-950 mb-8">Deliverables</h2>
                <div class="bg-charcoal-50 rounded-2xl p-8">
                    <div class="space-y-3">
                        <?php $__currentLoopData = $service['deliverables']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliverable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center gap-3 py-3 border-b border-charcoal-100 last:border-0">
                            <div class="w-6 h-6 rounded-full bg-brand-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-charcoal-800 font-medium text-sm"><?php echo e($deliverable); ?></span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(route($service['cta_route'])); ?>" class="btn-primary w-full justify-center mt-8">
                        <?php echo e($service['cta_text']); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-padding bg-charcoal-50">
    <div class="container-wide">
        <div class="text-center mb-14" data-animate>
            <span class="section-label">How It Works</span>
            <h2 class="section-title mt-3">Our Engagement Process</h2>
        </div>

        <div class="relative">
            <div class="hidden lg:block absolute top-8 left-0 right-0 h-px bg-gradient-to-r from-transparent via-brand-200 to-transparent"></div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <?php $__currentLoopData = $service['process']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div data-animate data-animate-delay="<?php echo e($loop->index * 100); ?>" class="text-center relative">
                    <div class="w-16 h-16 rounded-2xl bg-charcoal-950 text-white flex items-center justify-center font-black text-lg mx-auto mb-4 relative z-10"><?php echo e($step['step']); ?></div>
                    <h3 class="font-bold text-charcoal-950 mb-2"><?php echo e($step['title']); ?></h3>
                    <p class="text-charcoal-500 text-sm leading-relaxed"><?php echo e($step['desc']); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>


<section class="section-padding bg-white">
    <div class="container-tight">
        <div class="text-center mb-12" data-animate>
            <span class="section-label">Common Questions</span>
            <h2 class="section-title mt-3">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4" x-data="{ open: null }">
            <?php $__currentLoopData = $service['faqs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div data-animate data-animate-delay="<?php echo e($i * 100); ?>" class="border border-charcoal-100 rounded-2xl overflow-hidden hover:border-brand-200 transition-colors">
                <button @click="open === <?php echo e($i); ?> ? open = null : open = <?php echo e($i); ?>" class="w-full flex items-center justify-between gap-4 p-6 text-left hover:bg-charcoal-50 transition-colors" :aria-expanded="open === <?php echo e($i); ?>">
                    <span class="font-semibold text-charcoal-950"><?php echo e($faq['q']); ?></span>
                    <svg class="w-5 h-5 text-charcoal-400 flex-shrink-0 transition-transform" :class="{ 'rotate-180': open === <?php echo e($i); ?> }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open === <?php echo e($i); ?>" x-collapse class="px-6 pb-6">
                    <p class="text-charcoal-600 leading-relaxed"><?php echo e($faq['a']); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="section-padding-sm bg-charcoal-950">
    <div class="container-tight text-center" data-animate>
        <h2 class="text-3xl font-bold text-white mb-4">Ready to Get Started?</h2>
        <p class="text-charcoal-400 mb-8"><?php echo e($service['description']); ?></p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route($service['cta_route'])); ?>" class="btn-primary-lg"><?php echo e($service['cta_text']); ?></a>
            <a href="<?php echo e(route('contact')); ?>" class="btn-outline-white">Ask a Question</a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mayuresh/Projects/Nishant-Dada/FairIT Solutions/FairITSolutions Website/resources/views/services/_detail.blade.php ENDPATH**/ ?>