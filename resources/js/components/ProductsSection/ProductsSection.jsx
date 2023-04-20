import React, { useState, useEffect } from "react";
import ReactDOM from 'react-dom/client';
import { Link } from "react-router-dom";

const ProductsSection = () => {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    fetch("https://fakestoreapi.com/products")
      .then((response) => response.json())
      .then((data) => setProducts(data));
  }, []);

  return (
    <div className={`products-section`}>
      {products.map((product) => (
        <div className="product" key={product.id}>
          <img src={product.image} alt={product.title} />
          <h2>{product.title}</h2>
          <p className="price">${parseFloat(product.price).toFixed(2)}</p>
          <Link to={`/productDetailViewLink/${product.id}`}>
            <button>Mostrar descripción</button>
          </Link>
        </div>
      ))}
    </div>
  );
};

export default ProductsSection;

const rootElement = document.getElementById('products-section');
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<ProductsSection />);
}
