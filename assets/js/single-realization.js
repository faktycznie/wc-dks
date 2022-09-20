import Swiper, { Pagination } from 'swiper';

const gallery_wrapper = document.querySelector('.wp-block-gallery.swiper');

if(gallery_wrapper) {
  
  const items = gallery_wrapper.querySelector('.blocks-gallery-grid');

  async function initSwiperClasses() {
    items.classList.add('swiper-wrapper');
    [...items.children].forEach( (item) => {
      item.classList.add('swiper-slide');
    });
    //const arrowl = document.createElement("div");
    //const arrowr = document.createElement("div");
    const pagination = document.createElement("div");
    pagination.classList.add('swiper-pagination');
    pagination.classList.add('swiper-pagination--orange');
    pagination.classList.add('mt-5');
    gallery_wrapper.appendChild(pagination);
  }



  const makeSlider = () => {
      initSwiperClasses().then(result => {
        const swiper = new Swiper('.wp-block-gallery.swiper', {
          modules: [Pagination],
          loop: true,
          effect: 'slide',
          speed: 600,
          slidesPerView: 1.3,
          spaceBetween: 20,
          pagination: {
            el: ".swiper-pagination",
            type: 'bullets',
            clickable: true,
          },
          breakpoints: {
            // when window width is > bootstrap xl
            1200: {
              slidesPerView: 2,
            },
          }
        });
      });
  }

  const scrollToContent = () => {
    const content = document.querySelector('.case-studies');
    const items = document.querySelectorAll('#realizationProcess .process__items .card-link');
    if(content && items.length) {
      [...items].map((item) => {
        item.addEventListener('click', function (event) {
          content.scrollIntoView( { behavior: 'smooth', block: 'start' } );
        });
      });
    }
  }

  window.addEventListener('DOMContentLoaded', () => {
    makeSlider();
    scrollToContent();
  });

}
