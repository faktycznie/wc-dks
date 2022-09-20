import Swiper, { Navigation, Pagination } from 'swiper';

const swiper = new Swiper(".products-list__swiper", {
  modules: [Navigation, Pagination],
  loop: false,
  effect: 'slide',
  speed: 600,
  slidesPerView: 1.30,
  spaceBetween: 16,
  autoplay: {
    delay: 5000,
  },
  pagination: {
    el: ".products-list__pagination",
    type: 'bullets',
    clickable: true,
  },
  navigation: {
    nextEl: '.products-list__arrows--next',
    prevEl: '.products-list__arrows--prev',
  },
  breakpoints: {
    // when window width is > bootstrap xl
    1200: {
      slidesPerView: 3.30,
    },
  }
});