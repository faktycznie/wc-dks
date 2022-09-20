import React from 'react';
import ReactDOM from 'react-dom';
import ProductAddons from './Product-Addons';

const container = document.getElementById('product-addons');

if( container ) {
  ReactDOM.render(<ProductAddons />, container);
}