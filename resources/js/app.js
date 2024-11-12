import './bootstrap';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//Swiper JS
const swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 28,
    centeredSlides: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        type: "fraction",
        // formatFractionCurrent: function (number) {
        //     return number;
        // },
        //custom warna text dekat sini(nombor paginate tu)
        renderFraction: function (currentClass, totalClass) {
            return (
                '<span class="' +
                currentClass +
                '" style="color: #ffffff;"></span>' +
                ' <span class="swiper-pagination-separator" style="color: #ffffff;">/</span> ' +
                '<span class="' +
                totalClass +
                '" style="color: #ffffff;"></span>'
            );
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: false,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 28,
            centeredSlides: true,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 32,
        },
    },
});

//Swiper JS
const swiper2 = new Swiper(".mySwiper2", {
    slidesPerView: 3,
    spaceBetween: 28,
    centeredSlides: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        type: "fraction",
        // formatFractionCurrent: function (number) {
        //     return number;
        // },
        //custom warna text dekat sini(nombor paginate tu)
        renderFraction: function (currentClass, totalClass) {
            return (
                '<span class="' +
                currentClass +
                '" style="color: #ffffff;"></span>' +
                ' <span class="swiper-pagination-separator" style="color: #ffffff;">/</span> ' +
                '<span class="' +
                totalClass +
                '" style="color: #ffffff;"></span>'
            );
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: false,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 28,
            centeredSlides: true,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 32,
        },
    },
});
