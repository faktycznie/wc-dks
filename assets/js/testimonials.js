import Swiper, { Navigation, Pagination } from 'swiper';

const swiper = new Swiper(".swiper--testimonials", {
  modules: [Navigation, Pagination],
  loop: true,
  effect: 'slide',
  speed: 600,
  slidesPerView: 1,
  spaceBetween: 0,
  watchOverflow: true,
  autoplay: {
    delay: 5000,
  },
  pagination: {
    el: ".testimonials__pagination",
    type: 'bullets',
    clickable: true,
  },
  navigation: {
    nextEl: '.testimonials__arrows--next',
    prevEl: '.testimonials__arrows--prev',
  },
});