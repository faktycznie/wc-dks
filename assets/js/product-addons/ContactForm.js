import React, { useState } from 'react';

function ContactForm( props ) {
    const { dataAddons } = props;

    const [formState, setFormState] = useState({
      quantity: "",
      format: "",
      email: "",
      phone: "",
      message: "",
      class: "",
    });

    const formValidate = (fields) => {
      const invalid = [];

      [...fields].map((field => {
        switch(field.name) {
          case 'email':
            if( ! field.value.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) ) invalid.push(foreto.product_contact_email_invalid);
            break;
          case 'phone':
            if(field.value.length !== 0 && !field.value.match(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im)) {
              invalid.push(foreto.product_contact_phone_invalid);
            }
            break;
          default:
            break;
        }
      }));

      return invalid;
    }

    const requiredCategoriesValidate = () => {
      let reqCategories = [];
      for (const cat of dataAddons) {
        if( cat.required && cat.items.length === 0 ) {
          reqCategories.push(foreto.product_contact_addon_required + cat.name);
        }
      }
      return reqCategories;
    }

    const handleChange = (event) => {
      setFormState({
        ...formState,
        [event.target.name]: event.target.value,
      });
    }
  
    const handleSubmit = async (event) => {
      event.preventDefault();

      setFormState({...formState, message: "", class: ""});

      const requiredCats = requiredCategoriesValidate();
      if( requiredCats.length ) {
        setFormState({...formState, message: requiredCats, class: "alert-danger"});
        return;
      }

      const invalidFields = formValidate(event.target.elements);
      if( invalidFields.length ) {
        setFormState({...formState, message: invalidFields, class: "alert-danger"});
        return;
      }

      const output = document.querySelector('.contact__output').innerHTML;

      const res = await fetch(foreto.rest_url + 'foreto_mail/send', {
        method: 'POST',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({...formState, output, data: {...dataAddons}})
      });

      const data = await res.json();

      if(200 === res.status && data.success) {
        setFormState({...formState, message: data.message, class: "alert-success"});
        event.target.reset();
      } else {
        if( data.message ) {
          setFormState({...formState, message: data.message, class: "alert-danger"});
        }
        console.log('Send failed', data);
      }
    }

    const OutputResult = () => {

      return (
        <>
          <p>{foreto.product_contact_name}</p>
          { dataAddons && dataAddons.map((cat, cat_index) => (
            cat.items.length > 0 &&
            <div className="output" key={cat_index}>
              <p className="output__name">{cat.name}:</p>
              <ul className="output__list">
              { cat.items.map((item, item_index) => (
                <li className="output__item" key={item_index}>
                {item.value || item.name}
                </li>
              ))}
              </ul>
            </div>
          )) }
        </>
      )
    }

    return ( 
      <section id="contact" className="contact pt-sm-40 pb-160 pb-sm-80">
      <div className="contact__container container-lg">
        <div className="contact__item card card--grey border-0 rounded-right overflow-hidden">
            <div className="card-body p-0">
    
              <header className="contact__title">
                <h2 className="contact__h2 h2 text-md-center px-0 px-md-5"
                  dangerouslySetInnerHTML={{ __html: foreto.product_contact_heading }}
                ></h2>
              </header>
    
              <p className="card-text fw-normal fc-inherit text-md-center mb-0"
                dangerouslySetInnerHTML={{ __html: foreto.product_contact_description }}
              ></p>
    
              <div className="contact__inner pt-md-5">
                <div className="row">
                  <div className="col-12 col-md-6 contact__side py-5">
                    <h3 className="h3 mb-3"
                      dangerouslySetInnerHTML={{ __html: foreto.product_contact_choice }}
                    ></h3>
                    <div className="contact__output card-text">
                      <OutputResult />
                    </div>
                  </div>
    
                  <div className="col-12 col-md-6 contact__form">
                    <div className="contact-form card card--contact border-0 rounded-right">
                      <div className="card-body p-3 p-md-5">
                        <form className="product-form" onSubmit={handleSubmit}>
                          <p>
                            <label>
                              {foreto.product_contact_quantity}<br />
                              <select name="quantity" className="form-control" onChange={handleChange} required>
                                <option value=""></option>
                                {foreto.product_contact_quantity_value.map((item, index) => (
                                  <option key={index}>{item}</option>
                                ))}
                              </select>
                            </label>
                          </p>
                          <p>
                            <label>{foreto.product_contact_format}<br />
                              <select name="format" className="form-control" onChange={handleChange} required>
                                <option></option>
                                {foreto.product_contact_format_value.map((item, index) => (
                                    <option key={index}>{item}</option>
                                ))}
                              </select>
                            </label>
                          </p>
                          <p>
                            <label>{foreto.product_contact_email}<br />
                                <input type="email" name="email" className="form-control" onChange={handleChange} required />
                            </label>
                          </p>

                          <p>
                            <label>{foreto.product_contact_phone}<br />
                                <input type="tel" name="phone" className="form-control" onChange={handleChange} />
                            </label>
                          </p>

                          <p>
                            <button type="submit" className="btn btn-primary">{foreto.product_contact_send}</button>
                          </p>
                          {formState.message && <div className={`form-response alert ${formState.class}`}>{formState.message}</div>}
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>
    );
};

export default ContactForm;
