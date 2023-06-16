import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom/client';

const Carousel3D = () => {
    const [products, setProducts] = useState([]);

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

    return (
        <div className={`containerCarousel3d`}>
            <h2 className="carousel__title">Ultimos Productos</h2>
            <div className="carousel3d">
                {products.images && products.images.map((image) => (
                    <div key={image.product_id} className="containerImg" style={{ '--i': image.product_id }}>
                        <img src={image.url} alt="Product" />
                    </div>
                ))}
            </div>
        </div>
    );
};

export default Carousel3D;

const rootElement = document.getElementById('carousel3D');
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<Carousel3D />);
}
