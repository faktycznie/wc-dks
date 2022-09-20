import Swiper, { Navigation } from 'swiper';

const swiper = new Swiper(".collection-grid__swiper", {
  modules: [Navigation],
  loop: true,
  effect: 'slide',
  speed: 600,
  slidesPerView: 1,
  spaceBetween: 0,
  watchOverflow: true,
  autoplay: {
    delay: 5000,
  },
  navigation: {
    nextEl: '.collection-grid__arrows--next',
    prevEl: '.collection-grid__arrows--prev',
  },
});