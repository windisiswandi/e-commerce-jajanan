let currentIndex = 0;
const slider = document.getElementById('slider');
const slides = document.querySelectorAll('.slide');
const slideTitle = document.querySelectorAll('.slide h1');
const totalSlides = slides.length;
const dots = document.querySelectorAll('.dot');

document.getElementById('next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlider();
});

document.getElementById('prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateSlider();
});

dots.forEach(dot => {
    dot.addEventListener('click', () => {
        currentIndex = parseInt(dot.getAttribute('data-index'));
        updateSlider();
    });
});

function updateSlider() {
    const offset = -currentIndex * 100 / totalSlides;
    slider.style.transform = `translateX(${offset}%)`;
    updateDots();
    slideTitle.forEach((slide, index) => {
        if (index === currentIndex) slide.classList.add("animate-fadeUp")
        else slide.classList.remove("animate-fadeUp")
    })
}

function updateDots() {
    dots.forEach((dot, index) => {
        if (index === currentIndex) dot.classList.add('dot-active');
        else dot.classList.remove('dot-active');
    });
}

window.addEventListener('load', () => {
    updateSlider();
})


// setInterval(() => {
//     if (currentIndex >= totalSlides) currentIndex = 0
//     updateSlider();
//     currentIndex++;
// }, 3000);