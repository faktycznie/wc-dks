import React from 'react';

function ProductModal( props ) {
    const { selectedItem } = props;

    const handleClick = () => {
      const myModalEl = document.getElementById('modal_product');
      const myModal = window.bootstrap.Modal.getOrCreateInstance(myModalEl);
      myModal.hide();
      const section = document.querySelector('#contact');
      section.scrollIntoView( { behavior: 'smooth', block: 'start' } );
    }

    return ( 
    <div className="modal modal--product fade" id="modal_product" tabIndex="-1" aria-labelledby="modal_product_title" aria-hidden="true">
      <div className="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div className="modal-content rounded-right">
          <div className="modal-header border-0">
            <h5 className="modal-title" id="modal_product_title">{foreto.product_modal_heading}</h5>
            <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div className="modal-body">
            <div className={`card card--modal border-0 rounded-0 h-100 text-center text-md-start`}>
                <div className="row g-0 align-items-center">
                  <div className="col-md-3">
                    <div className="card-photo" style={selectedItem.bg ? {backgroundColor: selectedItem.bg} : null}>
                    {selectedItem.thumbnail &&
                        <img src={selectedItem.thumbnail} className="card-img-left" alt={selectedItem.name} />
                    }
                    </div>
                  </div>
                  <div className="col-md-9">
                    <div className="card-body ps-5">
                      <h5 className="card-title">{selectedItem.name}</h5>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div className="modal-footer border-0 justify-content-center justify-content-md-between">
            <button type="button" className="btn btn-link arrow-left-link" data-bs-dismiss="modal">{foreto.product_modal_continue}</button>
            <button type="button" className="btn btn-primary" onClick={()=> handleClick()}>{foreto.product_modal_query}</button>
          </div>
        </div>
      </div>
    </div>
    );
};

export default ProductModal;