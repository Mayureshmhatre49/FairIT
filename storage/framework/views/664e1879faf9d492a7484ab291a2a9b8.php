<?php $__env->startSection('title', 'Book AI Consultation — FairIT Solutions'); ?>
<?php $__env->startSection('description', 'Book a free AI strategy consultation with FairIT Solutions. Discuss your AI goals, challenges, and get expert guidance. Response within 24 hours.'); ?>

<?php $__env->startSection('content'); ?>

<section class="relative bg-charcoal-950 pt-32 pb-16 overflow-hidden">
    <div class="absolute inset-0 hero-grid opacity-20"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(37,99,235,0.2) 0%, transparent 70%);"></div>
    <div class="relative container-tight text-center">
        <div data-animate>
            <span class="text-brand-400 font-semibold text-sm uppercase tracking-widest">Start Here</span>
            <h1 class="text-5xl lg:text-6xl font-bold text-white mt-4 leading-tight">Book Your AI Consultation</h1>
            <p class="text-charcoal-300 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
                A focused 45-minute strategy session to understand your goals and map out your AI opportunity. No fluff, no sales pitch — just clarity.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-6 text-sm text-charcoal-400">
                <?php $__currentLoopData = ['45-minute focused session', 'No commitment required', 'Expert AI strategist', 'Actionable next steps']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-brand-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    <?php echo e($t); ?>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="container-wide">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            
            <div data-animate class="space-y-6">
                <h2 class="text-xl font-bold text-charcoal-950">What to Expect</h2>
                <div class="space-y-4">
                    <?php $__currentLoopData = [
                        ['num' => '1', 'title' => 'Discovery (15 min)', 'desc' => 'We learn about your business, goals, and current challenges.'],
                        ['num' => '2', 'title' => 'AI Assessment (15 min)', 'desc' => 'We identify your highest-impact AI opportunities and quick wins.'],
                        ['num' => '3', 'title' => 'Roadmap Preview (10 min)', 'desc' => 'We outline a practical path forward with clear next steps.'],
                        ['num' => '4', 'title' => 'Q&A (5 min)', 'desc' => 'Open floor for any questions, concerns, or ideas.'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 rounded-full bg-brand-600 text-white font-bold text-sm flex items-center justify-center flex-shrink-0"><?php echo e($step['num']); ?></div>
                        <div>
                            <div class="font-semibold text-charcoal-900 text-sm"><?php echo e($step['title']); ?></div>
                            <p class="text-charcoal-500 text-xs mt-0.5"><?php echo e($step['desc']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="bg-charcoal-50 rounded-2xl p-6 border border-charcoal-100 mt-8">
                    <div class="text-sm font-bold text-charcoal-950 mb-2">Completely Free</div>
                    <p class="text-charcoal-500 text-xs leading-relaxed">This consultation is complimentary. We believe you should understand your opportunity before making any financial commitment.</p>
                </div>
            </div>

            
            <div data-animate data-animate-delay="200" class="lg:col-span-2">
                <div class="bg-charcoal-50 rounded-2xl p-8 border border-charcoal-100">
                    <h2 class="text-2xl font-bold text-charcoal-950 mb-8">Tell Us About Your Needs</h2>

                    <?php if($errors->any()): ?>
                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                        <ul class="text-sm text-red-700 space-y-1">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('consultation.submit')); ?>" method="POST" class="space-y-5">
                        <?php echo csrf_field(); ?>
                        <div class="hidden" aria-hidden="true"><input type="text" name="honeypot" tabindex="-1" autocomplete="off"></div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="form-label">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="Your name" class="form-input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="form-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div>
                                <label for="email" class="form-label">Work Email <span class="text-red-500">*</span></label>
                                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="you@company.com" class="form-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="form-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="phone" class="form-label">Phone / WhatsApp</label>
                                <input type="tel" id="phone" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="+41 00 000 00 00" class="form-input">
                            </div>
                            <div>
                                <label for="company" class="form-label">Company Name</label>
                                <input type="text" id="company" name="company" value="<?php echo e(old('company')); ?>" placeholder="Your company" class="form-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="company_size" class="form-label">Company Size</label>
                                <select id="company_size" name="company_size" class="form-input">
                                    <option value="">Select...</option>
                                    <option value="Solo / 1 person">Solo / 1 person</option>
                                    <option value="2-10 employees">2–10 employees</option>
                                    <option value="11-50 employees">11–50 employees</option>
                                    <option value="51-200 employees">51–200 employees</option>
                                    <option value="200+ employees">200+ employees</option>
                                </select>
                            </div>
                            <div>
                                <label for="service" class="form-label">Primary Interest <span class="text-red-500">*</span></label>
                                <select id="service" name="service" class="form-input <?php $__errorArgs = ['service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <option value="">Select a service...</option>
                                    <option value="AI Transformation Advisory">AI Transformation Advisory</option>
                                    <option value="Custom AI Copilot Development">Custom AI Copilot Development</option>
                                    <option value="Voice AI & Conversational Automation">Voice AI & Conversational Automation</option>
                                    <option value="Managed AI Retainers">Managed AI Retainers</option>
                                    <option value="Founder Growth Advisory">Founder Growth Advisory</option>
                                    <option value="SarathiOS">SarathiOS — Founder OS</option>
                                    <option value="HSI OS">HSI OS — Interior OS</option>
                                    <option value="HandleLife OS">HandleLife OS — Life OS</option>
                                    <option value="Not sure — need guidance">Not sure — need guidance</option>
                                </select>
                                <?php $__errorArgs = ['service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="form-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="budget" class="form-label">Approximate Budget</label>
                                <select id="budget" name="budget" class="form-input">
                                    <option value="">Prefer not to say</option>
                                    <option value="Under CHF 5,000">Under CHF 5,000</option>
                                    <option value="CHF 5,000 - 20,000">CHF 5,000 – 20,000</option>
                                    <option value="CHF 20,000 - 50,000">CHF 20,000 – 50,000</option>
                                    <option value="CHF 50,000 - 100,000">CHF 50,000 – 100,000</option>
                                    <option value="CHF 100,000+">CHF 100,000+</option>
                                </select>
                            </div>
                            <div>
                                <label for="timeline" class="form-label">Desired Timeline</label>
                                <select id="timeline" name="timeline" class="form-input">
                                    <option value="">Select...</option>
                                    <option value="ASAP">ASAP</option>
                                    <option value="1-3 months">1–3 months</option>
                                    <option value="3-6 months">3–6 months</option>
                                    <option value="6-12 months">6–12 months</option>
                                    <option value="Exploring / no rush">Exploring / no rush</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="goals" class="form-label">What are you trying to achieve? <span class="text-red-500">*</span></label>
                            <textarea id="goals" name="goals" rows="4" placeholder="Describe your main business goals, current challenges, or what you'd like AI to help you solve..." class="form-input resize-none <?php $__errorArgs = ['goals'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('goals')); ?></textarea>
                            <?php $__errorArgs = ['goals'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="form-error"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="how_heard" class="form-label">How did you hear about us?</label>
                            <input type="text" id="how_heard" name="how_heard" value="<?php echo e(old('how_heard')); ?>" placeholder="Google, LinkedIn, referral, etc." class="form-input">
                        </div>

                        <button type="submit" class="btn-primary w-full justify-center py-4 text-base">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Request Consultation
                        </button>

                        <p class="text-xs text-charcoal-400 text-center">We will confirm your session within 24 hours. 100% confidential.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mayuresh/Projects/Nishant-Dada/FairIT Solutions/FairITSolutions Website/resources/views/consultation.blade.php ENDPATH**/ ?>