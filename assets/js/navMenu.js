const offcanvas = document.getElementById('offcanvas');
const btn = document.querySelector('[data-bs-toggle]');

offcanvas.addEventListener('show.bs.offcanvas', () => {
  btn.classList.add('hamburger--active');
  document.body.classList.add('offcanvas-show');
});

offcanvas.addEventListener('hide.bs.offcanvas', () => {
  btn.classList.remove('hamburger--active');
  document.body.classList.remove('offcanvas-show');
});

const toggleOffcanvasSide = () => {
  if (window.matchMedia('(max-width: 1199.98px)').matches) {
    offcanvas.classList.remove('offcanvas-start');
    offcanvas.classList.add('offcanvas-end');
  } else {
    offcanvas.classList.add('offcanvas-start');
    offcanvas.classList.remove('offcanvas-end');
  }
};

window.addEventListener('DOMContentLoaded', () => {
  toggleOffcanvasSide();
});

window.addEventListener('resize', () => {
  toggleOffcanvasSide();
});

const getSiblings = (n) => [...n.parentElement.children].filter((c) => c.nodeType === 1 && c !== n);

const createBackdrop = () => {
  const newDiv = document.createElement('div');
  newDiv.classList.add('offcanvas-backdrop', 'dropdown-backdrop', 'fade', 'show');
  document.body.appendChild(newDiv);
};

const removeBackdrop = () => {
  const backdrop = document.querySelector('.offcanvas-backdrop');
  if (document.body.contains(backdrop)) backdrop.remove();
};

const navLi = document.querySelectorAll('.nav-menu__list .menu-item-has-children');
if (navLi) {
  navLi.forEach((item) => {
    item.addEventListener('click', (e) => {
      const parents = getSiblings(e.currentTarget);
      parents.forEach((el) => el.classList.remove('menu-item-dropdown-active'));

      e.currentTarget.classList.toggle('menu-item-dropdown-active');

      const id = e.currentTarget.querySelector('li > a').getAttribute('rel');
      const dropdown = document.getElementById(id);
      if (dropdown) {
        const activeDropdown = document.querySelector('.dropdown--active');
        if (activeDropdown) {
          removeBackdrop();
          activeDropdown.classList.remove('dropdown--active');
          document.body.classList.remove('dropdown-show');
          if (id !== activeDropdown.id) {
            createBackdrop();
            dropdown.classList.add('dropdown--active');
            document.body.classList.add('dropdown-show');
          }
        } else {
          createBackdrop();
          dropdown.classList.add('dropdown--active');
          document.body.classList.add('dropdown-show');
        }
      }
    });
  });
}
const navBar = document.querySelector('.nav-bar');
const navLink = document.querySelectorAll('.nav-menu__list .menu-item-has-children > a');
if (navLink) {
  navLink.forEach((item) => {
    item.addEventListener('click', (e) => {
      if (!e.target.parentNode.classList.contains('menu-item-dropdown-active')) {
        e.preventDefault();
      }
    });
  });
}

const tabLink = document.querySelectorAll('.dropdown .nav-item > a');
if (tabLink) {
  tabLink.forEach((item) => {
    item.addEventListener('mousedown', (e) => {
      if (e.target.classList.contains('active')) {
        window.location.href = e.target.getAttribute('href');
      }
    });
  });
}

const dropdowns = document.querySelector('.dropdowns');
document.body.addEventListener('click', (e) => {
  const activeDropdown = document.querySelector('.dropdown--active');
  if (activeDropdown && !dropdowns.contains(e.target) && !navBar.contains(e.target)) {
    navLink.forEach((el) => el.parentNode.classList.remove('menu-item-dropdown-active'));
    activeDropdown.classList.remove('dropdown--active');
    document.body.classList.remove('dropdown-show');
    removeBackdrop();
  }
});
