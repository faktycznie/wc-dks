import Swiper, { Pagination } from 'swiper';

const swiper = new Swiper(".slider__swiper", {
  modules: [Pagination],
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
    el: ".slider__pagination",
    type: 'bullets',
    clickable: true,
  },
});

swiper.on('realIndexChange', function () {
  const descriptions = document.querySelectorAll('.slider__side .slider__description');
  descriptions.forEach((item) => item.classList.remove('slider__description--active'));
  const activeDescription = document.querySelector('.slider__side .slider__description.slide-' + swiper.realIndex);
  activeDescription.classList.add('slider__description--active');
});