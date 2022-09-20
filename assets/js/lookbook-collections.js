import Swiper, { Pagination } from 'swiper';

const swiper = new Swiper(".collection-item__swiper", {
  modules: [Pagination],
  loop: true,
  effect: 'slide',
  speed: 600,
  slidesPerView: 1.1,
  spaceBetween: 16,
  watchOverflow: true,
  autoplay: {
    delay: 5000,
  },
  pagination: {
    el: ".collection-item__pagination",
    type: 'bullets',
    clickable: true,
  },
});