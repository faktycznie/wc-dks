import React, { useState, useEffect } from 'react';
import SingleAddon from "./Single-Addon";
import GalleryAddon from "./Gallery-Addon";
import GalleryModal from './Gallery-Modal';
import QueryAddon from "./Query-Addon";
import ContactForm from "./ContactForm";
import ProductModal from "./Product-Modal";

function ProductAddons() {

  const section = document.getElementById('product-addons');
  const categories = JSON.parse(section.getAttribute('data-categories'));

  const defaultSelected = categories.map(a => {return {...a}});
  defaultSelected.forEach((cat, index) => {
    if(defaultSelected[index].items) {
      defaultSelected[index].items = cat.items.filter(el => el.isDefault === true);
    }
  });

  const [steps, setSteps] = useState(0);
  const [activeStep, setActiveStep] = useState(0);
  const [dataAddons, setDataAddons] = useState(defaultSelected);
  const [selectedItem, setSelectedItem] = useState(0);

  const saveData = (dataAddons) => {
    setDataAddons([...dataAddons]);
  }

  const selectItem = (selectedItem) => {
    setSelectedItem(selectedItem);
  }

  useEffect(() => {
    const tabs = document.querySelectorAll('.nav-pills--addons .nav-link');
    setSteps(tabs);

    tabs.forEach(function (target) {
      target.addEventListener('click', (e) => {
        const current = getActiveStepID();
        setActiveStep(current);
      });
    });

    const details = document.querySelectorAll('.card--addon .card-details-link');
    details.forEach(function (target) {
      target.addEventListener('click', (e) => {
        e.stopPropagation();
      });
    });

  }, []);

  const getActiveStepID = () => {
    const li = document.querySelector('.nav-pills--addons .nav-link.active').parentElement;
    const index = li.getAttribute('data-index');
    return parseInt(index);
  }

  const onNextClick = (e) => {
    e.preventDefault();
    const current = getActiveStepID();
    if( steps[current+1] ) {
      steps[current+1].click();
    }
  }
  
  const onPrevClick = (e) => {
    e.preventDefault();
    const current = getActiveStepID();
    if( steps[current-1] ) {
      steps[current-1].click();
    }
  }

  return (
    <>
      <div className="product-addons pt-80 pt-md-160 pb-80 pb-md-160">
        <div className="product-addons__container container">
        <div className="product-addons__items">

          <header className="product-addons__title">
            <h2 className="product-addons__h2 h2 text-md-center pb-5 m-0"
              dangerouslySetInnerHTML={{ __html: foreto.product_addons_heading }}></h2>
          </header>

            <div className="product-addons__row row m-0">
              <div className="product-addons__col1 col-12 col-md-3 p-0">
                <ul className="nav nav-pills nav-pills--addons flex-column" id="product-addons" role="tablist">
                {categories && categories.map((cat, index) => (
                  <li key={index} className="nav-item nav-item--product-addons" role="presentation" data-index={index}>
                    <button className={`nav-link btn-link ${index === 0 ? 'active' : ''} text-uppercase`} id={`product-addons-${index}-tab`} data-bs-toggle="tab" data-bs-target={`#product-addons-${index}`} type="button" role="tab" aria-controls={`product-addons-${index}`} aria-selected={0 === index ? 'true' : 'false'}>{cat.name}</button>
                  </li>
                ))}
                </ul>
              </div>
              <div className="product-addons__col2 col-12 col-md-9 p-0">
                <div className="product-addons__content">
                  <div className="tab-content">
                  {categories && categories.map((cat, index) => (
                    <div key={index} className={`tab-pane tab-pane--product-addons ${index === 0 ? 'active' : ''}`} id={`product-addons-${index}`} role="tabpanel" aria-labelledby={`product-addons-${index}-tab`}>
                        <button className="btn btn-link btn-collapse text-uppercase" data-bs-toggle="collapse" data-bs-target={`#product-addons-acc-${index}`} aria-expanded="false" aria-controls={`product-addons-acc-${index}`}>
                          {cat.name}
                        </button>
                        <div className="collapse" id={`product-addons-acc-${index}`}>
                          <div className="product-addons__content-inner">
                            <h3 className="product-addons__tab-heading mb-3">{cat.heading}</h3>

                            {cat.description &&
                            <div className="product-addons__tab-desc mb-4">
                              {cat.description}
                            </div>
                            }

                            <div className="product-addons__row-items row">
                            {cat.items && cat.items
                            .map((item, index) => {
                              if('gallery' == item.type) {
                                return <GalleryAddon key={index} cat={cat} item={item} dataAddons={dataAddons} saveData={saveData} selectItem={selectItem} />
                              } else if('query' == item.type) {
                                return <QueryAddon key={index} cat={cat} item={item} dataAddons={dataAddons} saveData={saveData} selectItem={selectItem} />
                              } else {
                                return <SingleAddon key={index} cat={cat} item={item} dataAddons={dataAddons} saveData={saveData} selectItem={selectItem} />
                              }
                            })}
                            </div>
                            
                          </div>
                        </div>
                      </div>
                  ))}
                  </div>
                  <div className="product-addons__nav d-none d-md-flex justify-content-between mt-5">
                    <button className={`${activeStep > 0 ? 'd-block' : 'd-none'} btn btn-link arrow-left-link product-addons__btn product-addons__btn--prev`} onClick={onPrevClick}>{foreto.product_addons_prev}</button>
                    <button className={`${activeStep == steps.length-1 ? 'd-none' : 'd-block'} btn btn-primary product-addons__btn product-addons__btn--next ms-auto`} onClick={onNextClick}>{foreto.product_addons_next}</button>
                  </div>
                </div>
                <div className="product-addons__nav d-block d-md-none mt-5">
                  <a href={foreto.product_addons_btn_url} className="btn btn-primary product-addons__btn d-block">{foreto.product_addons_btn}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <ContactForm dataAddons={dataAddons} />
      <ProductModal selectedItem={selectedItem} />
      <GalleryModal selectedItem={selectedItem} />
    </>
  );
}

export default ProductAddons;
