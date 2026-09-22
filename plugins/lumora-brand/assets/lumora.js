(function () {
    'use strict';

    var header = document.getElementById('lumora-header');

    // Sticky header style switch
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

    // Mobile menu
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

    // Scroll reveal
    var reveals = document.querySelectorAll('[data-lum-reveal]');
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('lum-in');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        reveals.forEach(function (el) { io.observe(el); });
    } else {
        reveals.forEach(function (el) { el.classList.add('lum-in'); });
    }
})();