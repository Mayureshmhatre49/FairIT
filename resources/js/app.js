import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

/* ============================================================
   SCROLL ANIMATIONS — IntersectionObserver
============================================================ */
document.addEventListener('DOMContentLoaded', () => {
    // Animate elements on scroll
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
    );

    document.querySelectorAll('[data-animate]').forEach((el) => observer.observe(el));

    // Navbar scroll behaviour
    const navbar = document.getElementById('navbar');
    if (navbar) {
        const handleScroll = () => {
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        };
        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();
    }

    // Mobile menu toggle
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            const icon = menuBtn.querySelector('svg');
            menuBtn.setAttribute('aria-expanded', mobileMenu.classList.contains('open'));
        });
    }

    // Smooth anchor scrolling
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (e) => {
            const target = document.querySelector(anchor.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Auto-dismiss flash messages
    document.querySelectorAll('[data-dismiss]').forEach((el) => {
        setTimeout(() => {
            el.style.opacity = '0';
            el.style.transition = 'opacity 0.5s';
            setTimeout(() => el.remove(), 500);
        }, 5000);
    });

    // Number counter animation
    document.querySelectorAll('[data-counter]').forEach((el) => {
        const target = parseInt(el.getAttribute('data-counter'), 10);
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const interval = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            el.textContent = target.toLocaleString();
                            clearInterval(interval);
                        } else {
                            el.textContent = Math.floor(current).toLocaleString();
                        }
                    }, 16);
                    counterObserver.unobserve(el);
                }
            });
        }, { threshold: 0.5 });

        counterObserver.observe(el);
    });
});

/* ============================================================
   AJAX FORM SUBMISSIONS
============================================================ */
window.submitForm = async function (formId, successMsg) {
    const form = document.getElementById(formId);
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const btn = form.querySelector('[type="submit"]');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg> Sending...';
        btn.disabled = true;

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: new FormData(form),
            });

            const data = await response.json();

            if (data.success) {
                showToast(successMsg || data.message, 'success');
                form.reset();
            } else {
                showToast('Something went wrong. Please try again.', 'error');
            }
        } catch (error) {
            showToast('Network error. Please try again.', 'error');
        } finally {
            btn.innerHTML = originalText;
            btn.disabled = false;
        }
    });
};

/* ============================================================
   TOAST NOTIFICATIONS
============================================================ */
window.showToast = function (message, type = 'success') {
    const colours = {
        success: 'bg-emerald-600 text-white',
        error:   'bg-red-600 text-white',
        info:    'bg-brand-600 text-white',
    };

    const toast = document.createElement('div');
    toast.className = `fixed bottom-6 right-6 z-50 ${colours[type]} px-6 py-4 rounded-xl shadow-premium text-sm font-medium max-w-sm`;
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transition = 'opacity 0.5s';
        setTimeout(() => toast.remove(), 500);
    }, 4000);
};

/* ============================================================
   COOKIE CONSENT
============================================================ */
document.addEventListener('DOMContentLoaded', () => {
    const banner = document.getElementById('cookie-banner');
    if (banner && !localStorage.getItem('cookie_consent')) {
        banner.classList.remove('hidden');
    }

    document.getElementById('cookie-accept')?.addEventListener('click', () => {
        localStorage.setItem('cookie_consent', 'true');
        banner?.classList.add('hidden');
    });

    document.getElementById('cookie-decline')?.addEventListener('click', () => {
        localStorage.setItem('cookie_consent', 'declined');
        banner?.classList.add('hidden');
    });
});
