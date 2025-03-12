// Modo Oscuro
const themeToggle = document.getElementById('themeToggle');
const body = document.body;

themeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');
    if (body.classList.contains('dark-mode')) {
        themeToggle.textContent = 'Modo Claro';
    } else {
        themeToggle.textContent = 'Modo Oscuro';
    }
});

// Validación del formulario
(function () {
    'use strict'
    var form = document.getElementById('contactForm')
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }
        form.classList.add('was-validated')
    }, false)
})();

// Efectos de Scroll
ScrollReveal().reveal('.card', { delay: 300, distance: '50px', origin: 'bottom', interval: 200 });
ScrollReveal().reveal('h1', { delay: 200, distance: '20px', origin: 'left' });

// Música de fondo
const audio = document.getElementById('backgroundMusic');
const playPauseBtn = document.getElementById('playPauseBtn');
const muteBtn = document.getElementById('muteBtn');

playPauseBtn.addEventListener('click', () => {
    if (audio.paused) {
        audio.play();
        playPauseBtn.textContent = '⏸️';
    } else {
        audio.pause();
        playPauseBtn.textContent = '▶️';
    }
});

muteBtn.addEventListener('click', () => {
    audio.muted = !audio.muted;
    muteBtn.textContent = audio.muted ? '🔇' : '🔊';
});