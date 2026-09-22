(function () {
    'use strict';

    var header = document.getElementById('lumora-header');

    function onScroll() {
        if (!header) return;
        if (window.scrollY > 40) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    var burger = document.getElementById('lumora-burger');
    if (burger && header) {
        var navLinks = header.querySelectorAll('a');
        burger.addEventListener('click', function () {
            var open = header.classList.toggle('is-open');
            burger.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                header.classList.remove('is-open');
                burger.setAttribute('aria-expanded', 'false');
            });
        });
    }

    // Scroll reveal with staggered animation support (data-lum-delay="80" etc)
    var reveals = document.querySelectorAll('[data-lum-reveal]');
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var delay = parseInt(entry.target.getAttribute('data-lum-delay'), 10) || 0;
                    if (delay > 0) {
                        setTimeout(function () { entry.target.classList.add('lum-in'); }, delay);
                    } else {
                        entry.target.classList.add('lum-in');
                    }
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });
        reveals.forEach(function (el) { io.observe(el); });
    } else {
        reveals.forEach(function (el) { el.classList.add('lum-in'); });
    }

    // Smooth anchor offset for fixed header
    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
        link.addEventListener('click', function (e) {
            var href = link.getAttribute('href');
            if (!href || href.length < 2 || href === '#') return;
            var target = document.querySelector(href);
            if (!target) return;
            e.preventDefault();
            var top = target.getBoundingClientRect().top + window.scrollY - 72;
            window.scrollTo({ top: top, behavior: 'smooth' });
        });
    });
})();