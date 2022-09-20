const personalizationBtn = () => {
  const btn = document.querySelector('.product-header__button .btn');
  if( btn ) {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const section = document.querySelector('.product-addons');
      if(section) section.scrollIntoView( { behavior: 'smooth', block: 'start' } );
    });
  }
}

window.addEventListener('DOMContentLoaded', () => {
  personalizationBtn();
});