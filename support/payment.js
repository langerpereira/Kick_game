document.addEventListener('DOMContentLoaded', function () {
    const parallaxContainer = document.querySelector('.parallax-container');

    window.addEventListener('scroll', function () {
        const scrolled = window.scrollY;
        parallaxContainer.style.transform = `translateY(${scrolled * 0.5}px)`;
    });
});
