const makeFiltersActive = () => {
  const catValue = document.querySelector('.sidebar--realizations form input[name="r_cat"]').value;
  const indValue = document.querySelector('.sidebar--realizations form input[name="r_industry"]').value;

  if (catValue && catValue !== '0') {
    const catArr = catValue.split(',');
    catArr.forEach((id) => {
      const el = document.querySelector('.sidebar--realizations .cat-item-' + id);
      if (el) el.classList.add('active');
    });
  } else {
    document.querySelectorAll('.sidebar--realizations .widget--r_cat .cat-item').forEach((el) => {
      el.classList.add('active');
    });
  }
  if (indValue && indValue !== '0') {
    const indArr = indValue.split(',');
    indArr.forEach((id) => {
      const el = document.querySelector('.sidebar--realizations .cat-item-' + id);
      if (el) el.classList.add('active');
    });
  } else {
    document.querySelectorAll('.sidebar--realizations .widget--r_industry .cat-item').forEach((el) => {
      el.classList.add('active');
    });
  }
};

const getID = (el) => el.className.match(/\d+/g)[0];

const buildArray = (reload = true) => {
  const catField = document.querySelector('.sidebar--realizations form input[name="r_cat"]');
  const indField = document.querySelector('.sidebar--realizations form input[name="r_industry"]');
  const pagedField = document.querySelector('.sidebar--realizations form input[name="paged"]');

  if (catField || indField) {
    const activeCat = document.querySelectorAll('.sidebar--realizations .widget--r_cat .wp-block-categories li.active');
    const activeInd = document.querySelectorAll('.sidebar--realizations .widget--r_industry .wp-block-categories li.active');
    const paged = parseInt(pagedField.value);

    const catIDs = [];
    const indIDs = [];

    activeCat.forEach((el) => {
      const id = getID(el);
      catIDs.push(id);
    });

    activeInd.forEach((el) => {
      const id = getID(el);
      indIDs.push(id);
    });

    catField.value = catIDs.join(',');
    indField.value = indIDs.join(',');

    if (catIDs.length === 0 && indIDs.length === 0) {
      // no items to display, mark all checkboxes
      makeFiltersActive();
    }

    const data = {
      'r_cat': catIDs,
      'r_industry': indIDs,
      'paged': paged
    }

    ajaxRequest(data);
  }
};

const catFilters = () => {
  makeFiltersActive();
  const filters = document.querySelectorAll('.sidebar--realizations .wp-block-categories li > a');
  const pagField = document.querySelector('.sidebar--realizations form input[name="paged"]');
  if (filters) {
    filters.forEach((el) => {
      el.addEventListener('click', (e) => {
        e.preventDefault();
        const parent = e.target.parentNode;
        parent.classList.toggle('active');
        pagField.value = 1; // reset pagination when filters changed
        buildArray();
      });
    });

    document.addEventListener('click', (e) => {
      if (e.target && e.target.classList.contains('page-numbers') && e.target.tagName === 'A') {
        e.preventDefault();
        const num = e.target.textContent;
        pagField.value = parseInt(num);
        buildArray();
      }
    });
  }
}

const ajaxRequest = async (data) => {
  const items_container = document.querySelector('.latest--realizations');

  if (items_container) {
    items_container.style.opacity = '0.5';
    try {
      // Fetch posts
      const args = {
        action: 'get_realization_data',
        r_cat: data?.r_cat,
        r_industry: data?.r_industry,
        paged: data?.paged
      }

      const params = new URLSearchParams(args);

      fetch(foreto.ajax_url, {
        method: 'POST',
        body: params
      }).then((resp) => resp.text()).then(resp => {
        items_container.innerHTML = resp;
        items_container.style.opacity = '1';
      });
      return true;
    } catch (e) {
      // print error
      console.log(e);
      return false;
    }
  }
};

window.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.querySelector('.sidebar--realizations');
  if (sidebar) {
    catFilters();
  }
});
