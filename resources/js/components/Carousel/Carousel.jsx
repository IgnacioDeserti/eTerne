import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom/client';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick";
import ProductDetailViewLink from './ProductDetailViewLink';
import Footer from '../Footer/Footer';

const Carousel = () => {
  const [products, setProducts] = React.useState([]);
  const [selectedProduct, setSelectedProduct] = React.useState(null);

  useEffect(() => {
    fetch("https://fakestoreapi.com/products")
      .then((res) => res.json())
      .then((data) => setProducts(data));
  }, []);

  const settings = {
    infinite: true,
    speed: 4000,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: -20,
    arrow: false,
    cssEase: "linear",
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1.5,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 590,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 410,
        settings: {
          slidesToShow: 0.8,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 350,
        settings: {
          slidesToShow: 0.7,
          slidesToScroll: 1,
        },
      },
    ],
  };

  const handleProductClick = (product) => {
    setSelectedProduct(product);
  };

  return (<>
    <div className="carousel">
      {selectedProduct ? (
        <div>
          <ProductDetailViewLink product={selectedProduct} />
        </div>
      ) : (
        <>
          <h2 className="carousel__title">Productos destacados</h2>
          <Slider
            className="carousel__slider"
            {...settings}
            draggable={false}
            style={{ userSelect: 'none' }}
          >
            {products.map((product) => (
              <div
                key={product.id}
                className="carousel__slide"
                onClick={() => handleProductClick(product)}
              >
                <img
                  className="carousel__image"
                  src={product.image}
                  alt={product.title}
                />
                <h3 className="carousel__subtitle">{product.title}</h3>
                <p className="carousel__price">{product.price}$</p>
              </div>
            ))}
          </Slider>
        </>
      )}
    </div>
    <Footer />
    </>
  );
};

export default Carousel;


const rootElement = document.getElementById('carousel');
if (rootElement) {
  ReactDOM.createRoot(rootElement).render(<Carousel />);
}
