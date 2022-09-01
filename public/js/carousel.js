const slides = document.querySelectorAll(".slide");
console.log(slides);

slides.forEach((slide, indx) => {
    slide.style.transform = `translateX(${indx * 100}%)`;
});

let curSlide = 1;
let maxSlide = slides.length - 1;

const nextSlide = document.querySelector(".btn-next");
const prevSlide = document.querySelector(".btn-prev");


window.addEventListener('load', (event) => {
    slides.forEach((slide, indx) => {
        slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
        opacity();
    });
});


nextSlide.addEventListener("click", function () {
    if (curSlide === maxSlide) {
        curSlide = 0;
    } else {
        curSlide++;
    }

    slides.forEach((slide, indx) => {
        slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
        opacity();
    });
});

prevSlide.addEventListener("click", function () {
    if (curSlide === 0) {
        curSlide = maxSlide;
    } else {
        curSlide--;
    }
    slides.forEach((slide, indx) => {
        slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
        opacity();
    });
});

function opacity() {
    slides.forEach( function (slide) {
    $(slide).css("opacity", ".3");
    });
    $(slides[curSlide]).css("opacity", "1");
}