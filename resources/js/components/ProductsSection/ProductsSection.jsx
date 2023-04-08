import React, { useState, useEffect } from "react";
import ReactDOM from 'react-dom/client';
import ItemCount from "../ItemCount/ItemCount";
import ProductDetail from "../ProductDetail/ProductDetail";

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

          <ProductDetail product={product}/>
          <ItemCount
            initial={0}
            stock={10}
            onAdd={(quantity) => console.log("Cantidad agregada ", quantity)}
          />
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
