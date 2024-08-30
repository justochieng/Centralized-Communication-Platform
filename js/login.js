
document.addEventListener('DOMContentLoaded', () => {
    const fadeElements = document.querySelectorAll('.fade-in, .fade-in-delay, .fade-in-delay2');
    fadeElements.forEach(el => el.classList.add('visible'));
});
