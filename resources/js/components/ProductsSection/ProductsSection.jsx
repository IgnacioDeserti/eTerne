import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom/client';
import FilterBar from '../FilterBar/FilterBar';
const ProductSection = () => {
  const [selectedProduct, setSelectedProduct] = useState(null);
  const [products, setProducts] = useState([]);
  const [filters, setFilters] = useState({
    category: "",
    minPrice: "",
    maxPrice: "",
  });

  useEffect(() => {
    const fetchProducts = async () => {
      try {
        const response = await fetch('http://eTerne.com:8000/productosReact');
        const data = await response.json();
        setProducts(data);
      } catch (error) {
        console.error(error);
      }
    };
    fetchProducts();
  }, []);

  const filteredProducts = products.productos
    ? products.productos.filter((product) => {
        return (
          (!filters.category || product.category === filters.category) &&
          (!filters.minPrice || product.price >= filters.minPrice) &&
          (!filters.maxPrice || product.price <= filters.maxPrice)
        );
      })
    : [];

    return (
      <div className="products-container">
        <FilterBar onFilterChange={setFilters} />
        <div className='products-section'>
          {filteredProducts.length > 0 ? (
            filteredProducts.map((product) => (
              <div
                key={product.id}
                className="product">
                {products.images && products.images.map((image) => {
                  return image.product_id === product.id ? (
                    <img
                      key={image.product_id}
                      src={image.url}
                      alt={product.title}
                    />
                  ) : "";
                })}
                <h2>{product.name}</h2>
                <p className="price">${product.price}</p>
                <button onClick={() => window.location.href = `http://eTerne.com:8000/clientShowCarousel/${product.id}`}>Mostrar descripción</button>
              </div>
            ))
          ) : (
            <p>No se encontraron productos con las condiciones especificadas.</p>
          )}
        </div>
      </div>
    );
};

export default ProductSection;

const rootElement = document.getElementById('products-section');
if (rootElement) {
  ReactDOM.createRoot(rootElement).render(<ProductSection />);
}
