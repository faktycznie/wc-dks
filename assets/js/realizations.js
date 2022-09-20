import Swiper, { Navigation, Pagination } from 'swiper';

const realizations = document.querySelector('.realizations__swiper');

if (realizations) {
  const swiper = new Swiper('.realizations__swiper', {
    modules: [Navigation, Pagination],
    loop: true,
    effect: 'slide',
    speed: 600,
    slidesPerView: 1,
    spaceBetween: 0,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.realizations__pagination',
      type: 'bullets',
      clickable: true,
    },
    navigation: {
      nextEl: '.realizations__arrows--next',
      prevEl: '.realizations__arrows--prev',
    },
    breakpoints: {
      // when window width is > bootstrap xl
      1200: {
        slidesPerView: 1.5,
        spaceBetween: 16,
      },
    },
  });

  window.addEventListener('resize', () => {
    swiper.update();
  });
}
