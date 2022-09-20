import React from 'react';

function SingleAddon(props) {

    const {cat, item, dataAddons, saveData, selectItem} = props;
    const getSiblings = n => [...n.parentElement.children].filter(c=>c.nodeType == 1 && c!=n);

    const handleClick = (e) => {
      const wrapper = e.currentTarget.parentElement;
      const selected = wrapper.classList.contains('selected');

      const cat_index = dataAddons.findIndex(object => {
        return object.id === cat.id;
      });

      const myModalEl = document.getElementById('modal_product');
      const myModal = window.bootstrap.Modal.getOrCreateInstance(myModalEl);

      if( selected ) {
        const filteredItems = [...dataAddons][cat_index].items.filter(el => el.id !== item.id);
        if( cat.required && filteredItems.length == 0 ) {
          return;
        }
        dataAddons[cat_index].items = filteredItems;
      } else {
        if( cat_index > -1 ) {
          if( !cat.multiple ) {
            const siblings = getSiblings(wrapper);
            siblings.forEach((el) => {
              el.classList.remove('selected')
            });
            dataAddons[cat_index].items = [];
          }
          selectItem(item);
          myModal.show();
          dataAddons[cat_index].items.push(item);
        } else {
          selecteItem(item);
          myModal.show();
          dataAddons.push({
            id: cat.id,
            name: cat.name,
            items: [item]
          });
        }
      }
      wrapper.classList.toggle('selected');
      saveData(dataAddons);
    }

    return ( 
      <div className={`products-addon__item col-6 col-md-3 ${item.isDefault? 'selected': ''}`}>
        <div className={`card card--addon border-0 rounded-0 h-100 ${item.isDefault? 'default-item': ''}`} onClick={(e) => handleClick(e)}>
              <div className="card-photo hover-zoom plus-sign" style={item.bg ? {backgroundColor: item.bg} : null}>
              {item.thumbnail &&
                <>
                  <img src={item.thumbnail} className="card-img-top" alt={item.name} />
                  <a className="card-details-link arrow-right arrow-right-link" href={item.url}>{foreto.product_addons_more}</a>
                </>
              }
              </div>
              {item.name && <div className="card-body px-0">
                <h5 className="d-inline-block card-title arrow-right arrow-right--hidden">{item.name}</h5>
              </div>}
        </div>
      </div>
    );
};

export default SingleAddon;
