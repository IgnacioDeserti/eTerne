import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom/client';

const ImageGallery = () => {
    const [products, setProducts] = useState([]);

    useEffect(() => {
        const fetchProducts = async () => {
            try {
                const response = await fetch('http://localhost:8000/productosReact');
                const data = await response.json();
                setProducts(data);
            } catch (error) {
                console.error(error);
            }
        };
        fetchProducts();
    }, []);

    console.log(products.images)
    /* products.images.map((image) => {
        console.log(image)
    }) */

    return (
        <div className={`containerCarousel3d`}>
            <h2 className="carousel__title">Ultimos Productos</h2>
            <div className="carousel3d">
                {products.images && products.images.map((image) => (
                    <div key={image.product_id} className="containerImg" style={{ '--i': image.product_id, '--img': `url(${image.url})` }}></div>
                ))}
            </div>
        </div>
    );
};

export default ImageGallery;


const rootElement = document.getElementById('imageGallery');
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<ImageGallery />);
}