// ===================================================
// Flow Yoga Studio – Shared JS
// ===================================================

document.addEventListener('DOMContentLoaded', function () {

    // Navbar scroll effect
    const nav = document.getElementById('top-nav');
    if (nav) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                nav.classList.add('navbar-scrolled');
                nav.classList.remove('py-6');
                nav.classList.add('py-3');
            } else {
                nav.classList.remove('navbar-scrolled');
                nav.classList.remove('py-3');
                nav.classList.add('py-6');
            }
        });
    }

    // Parallax hero image (jen na homepage)
    const container = document.getElementById('hero-image-container');
    const img = document.getElementById('parallax-img');

    if (container && img) {
        let mouseX = 0, mouseY = 0, currentX = 0, currentY = 0;

        window.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX / window.innerWidth) * 2 - 1;
            mouseY = (e.clientY / window.innerHeight) * 2 - 1;
        });

        function animate() {
            currentX += (mouseX - currentX) * 0.05;
            currentY += (mouseY - currentY) * 0.05;
            img.style.setProperty('--mouse-x', currentX);
            img.style.setProperty('--mouse-y', currentY);
            requestAnimationFrame(animate);
        }
        animate();
    }

});
