const contactSubject = () => {
  const form = document.querySelector('#contact');
  const steps = document.querySelector('.contact-steps__items');
  if (form && steps) {
    const links = steps.querySelectorAll('a');
    if (links) {
      links.forEach((link) => {
        link.addEventListener('click', () => {
          let number = link.getAttribute('href').replace('#contact-', '');
          number = parseInt(number) - 1;
          form.scrollIntoView({ behavior: 'smooth', block: 'start' });
          const select = form.querySelector('#subject');
          if (select) {
            select.getElementsByTagName('option')[number].selected = 'selected';
          }
        });
      });
    }
  }
};

window.addEventListener('DOMContentLoaded', () => {
  contactSubject();
});