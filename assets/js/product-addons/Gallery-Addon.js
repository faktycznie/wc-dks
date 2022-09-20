import React from 'react';

function GalleryAddon(props) {

    const {cat, item, dataAddons, saveData, selectItem} = props;

    const handleClick = (e) => {
      if(item.gallery && item.gallery.length) {
        selectItem(item);
        const myModalEl = document.getElementById('modal_gallery');
        const myModal = window.bootstrap.Modal.getOrCreateInstance(myModalEl);
        myModal.show();
      }
    }

    return ( 
      <div className={`products-addon__item col-6 col-md-3 ${item.isDefault? 'selected': ''}`}>
        <div className={`card card--addon border-0 rounded-0 h-100 ${item.isDefault? 'default-item': ''}`} onClick={(e) => handleClick(e)}>
              <div className="card-photo hover-zoom gallery-sign">
              {item.thumbnail &&
                <>
                  <img src={item.thumbnail} className="card-img-top" alt={item.name} />
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

export default GalleryAddon;
