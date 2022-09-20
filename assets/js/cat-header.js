import Swiper, { Navigation, Pagination } from 'swiper';

const swiper = new Swiper(".category-header__swiper", {
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
    el: ".category-header__pagination",
    type: 'bullets',
    clickable: true,
  },
  navigation: {
    nextEl: '.category-header__arrows--next',
    prevEl: '.category-header__arrows--prev',
  },
});