import React from 'react';

function QueryAddon(props) {

    const {cat, item, dataAddons, saveData, selectItem} = props;
    const getSiblings = n => [...n.parentElement.children].filter(c=>c.nodeType == 1 && c!=n);

    const handleClick = (e) => {
      const wrapper = e.currentTarget.parentElement;
      const selected = wrapper.classList.contains('selected');

      const cat_index = dataAddons.findIndex(object => {
        return object.id === cat.id;
      });

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

          dataAddons[cat_index].items.push(item);
        } else {
          selecteItem(item);

          dataAddons.push({
            id: cat.id,
            name: cat.name,
            items: [item]
          });
        }
      }
      wrapper.classList.toggle('selected');
      saveData(dataAddons);

      const section = document.querySelector('#contact');
      section.scrollIntoView( { behavior: 'smooth', block: 'start' } );
    }

    return ( 
      <div className={`products-addon__item col-6 col-md-3`}>
        <div className="card card--presentation border-0 h-100" onClick={(e) => handleClick(e)}>
          <div className="card-body rounded-right overflow-hidden d-flex flex-column p-20">
            <h5 className="mt-auto card-title fc-white">{item.name}</h5>
            <span className="arrow-long mt-3 fc-white"></span>
          </div>
        </div>
      </div>
    );
};

export default QueryAddon;
