import { getBreakpoint } from './utils';
import Swiper, { Pagination } from 'swiper';

const news = document.querySelector('.news.news--slider');

if(news) {
  const items = news.querySelector('.news__items');
  const pagination = news.querySelector('.news__pagination');

  async function initSwiperClasses() {
    items.parentNode.classList.add('swiper');
    items.classList.add('swiper-wrapper');
    [...items.children].forEach( (item) => {
      item.classList.add('swiper-slide');
    });
    pagination.classList.add('swiper-pagination');
  }

  function destroySwiper() {
    items.parentNode.classList.remove('swiper');
    items.classList.remove('swiper-wrapper');
    [...items.children].forEach( (item) => {
      item.classList.remove('swiper-slide');
    });
    pagination.classList.remove('swiper-pagination');
  }

  const makeSlider = () => {

    if( getBreakpoint() === 'xs' || getBreakpoint() === 'sm' ) {
      initSwiperClasses().then(result => {
  
        // configure Swiper to use modules
        Swiper.use([Pagination]);
  
        const swiper = new Swiper('.news__inner', {
          loop: true,
          effect: 'slide',
          speed: 600,
          slidesPerView: 1.1,
          spaceBetween: 20,
          pagination: {
            el: ".swiper-pagination",
            type: 'bullets',
            clickable: true,
          },
        });
      });
    } else {
      const swiper = document.querySelector('.news__inner').swiper;
      swiper?.destroy();
      destroySwiper();
    }
  }

  window.addEventListener('DOMContentLoaded', () => {
    makeSlider();
  });
  
  window.addEventListener('resize', () => {
    makeSlider();
  });
}
