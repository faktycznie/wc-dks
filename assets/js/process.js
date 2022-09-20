import { getBreakpoint } from './utils';
import Swiper from 'swiper';

const process_wrapper = document.querySelector('.process');

if(process_wrapper) {
  
  const items = process_wrapper.querySelector('.process__row');

  async function initSwiperClasses() {
    items.parentNode.classList.add('swiper');
    items.classList.add('swiper-wrapper');
    items.classList.remove('row');
    [...items.children].forEach( (item) => {
      item.classList.remove('col-12');
      item.classList.remove('col-md-3');
      item.classList.add('swiper-slide');
    });
  }

  function destroySwiper() {
    items.parentNode.classList.remove('swiper');
    items.classList.remove('swiper-wrapper');
    items.classList.add('row');
    [...items.children].forEach( (item) => {
      item.classList.remove('swiper-slide');
      item.classList.add('col-12');
      item.classList.add('col-md-3');
    });
  }

  const makeSlider = () => {

    if( getBreakpoint() === 'xs' || getBreakpoint() === 'sm' ) {
      initSwiperClasses().then(result => {
  
        const swiper = new Swiper('.process__items', {
          loop: true,
          effect: 'slide',
          speed: 600,
          slidesPerView: 1.1,
          spaceBetween: 20,
        });
      });
    } else {
      const swiper = document.querySelector('.process__items').swiper;
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
