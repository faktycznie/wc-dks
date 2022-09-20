const getBreakpoint = () => {
  const w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  return (w < 768) ? 'xs' : ((w < 992) ? 'sm' : ((w < 1200) ? 'md' : 'lg'));
}

const responsiveOffers = () => {
  const offers = document.querySelector('.offers');
  if(offers) {
    const offers_desktop = offers.querySelector('.nav-item--desktop > button.active');
    const offers_mobile = offers.querySelectorAll('.nav-item--cats > button')[0];
    if( offers_desktop && offers_mobile && getBreakpoint() == 'xs' || getBreakpoint() == 'sm' ) {
      offers_mobile.click();
    }
  }
}

window.addEventListener('DOMContentLoaded', () => {
  responsiveOffers();
});

window.addEventListener('resize', () => {
  responsiveOffers();
});

