const slideImages = [
    '/uploads/home/200 (20).png',
    '/uploads/home/back.jpg',
    '/uploads/home/front.jpg',
    '/uploads/home/security.jpg'
];
const bgGifs = [
    'https://media.giphy.com/media/3o7aD2saalBwwftBIY/giphy.gif',
    'https://media.giphy.com/media/l0MYt5jPR6QX5pnqM/giphy.gif',
    'https://media.giphy.com/media/26ufdipQqU2lhNA4g/giphy.gif',
    'https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif'
];
let current = 0;
const slideImg = document.getElementById('monitor-slide-img');
const bgGifImg = document.getElementById('monitor-bg-gif-img');
const dots = document.querySelectorAll('.monitor-dot');
function showSlide(idx) {
    if(idx === current) return;
    // افکت fade
    slideImg.style.opacity = 0;
    setTimeout(() => {
        slideImg.src = slideImages[idx];
        bgGifImg.src = bgGifs[idx];
        slideImg.style.opacity = 1;
    }, 400);
    dots[current].classList.remove('active');
    dots[idx].classList.add('active');
    current = idx;
}
dots.forEach((dot, idx) => {
    dot.addEventListener('click', () => showSlide(idx));
});
setInterval(() => {
    let next = (current + 1) % slideImages.length;
    showSlide(next);
}, 5000); 