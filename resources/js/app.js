import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
    duration: 800,
    easing: 'ease-out-cubic',
    once: true,
    offset: 100,
});

window.AOS = AOS;

function toggleDarkMode() {
    document.documentElement.classList.toggle('dark');
    const isDarkNow = document.documentElement.classList.contains('dark');
    localStorage.setItem('darkMode', isDarkNow);
}

const darkModeToggle = document.getElementById('darkModeToggle');
if (darkModeToggle) {
    darkModeToggle.addEventListener('click', toggleDarkMode);
}

const darkModeToggleMobile = document.getElementById('darkModeToggleMobile');
if (darkModeToggleMobile) {
    darkModeToggleMobile.addEventListener('click', toggleDarkMode);
}

const counters = document.querySelectorAll('[data-counter]');
const observerOptions = { threshold: 0.5 };

const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const target = entry.target;
            const endValue = parseInt(target.getAttribute('data-counter'));
            const duration = 2000;
            const startTime = performance.now();

            const animate = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easeOut = 1 - Math.pow(1 - progress, 3);
                const currentValue = Math.floor(easeOut * endValue);
                target.textContent = currentValue.toLocaleString();
                if (progress < 1) {
                    requestAnimationFrame(animate);
                } else {
                    target.textContent = endValue.toLocaleString();
                }
            };

            requestAnimationFrame(animate);
            counterObserver.unobserve(target);
        }
    });
}, observerOptions);

counters.forEach(counter => counterObserver.observe(counter));

const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');
if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
}
