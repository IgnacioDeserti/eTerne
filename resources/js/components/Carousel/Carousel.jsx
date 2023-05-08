import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom/client';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import Slider from "react-slick";
import Button from "../Button/Button";

const Carousel = () => {
  const [selectedProduct, setSelectedProduct] = useState(null);
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
        breakpoint: 425,
        settings: {
          slidesToShow: 0.8,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 350,
        settings: {
          slidesToShow: 0.6,
          slidesToScroll: 1,
        },
      },
    ],
  };

  const handleProductClick = (product) => {
    setSelectedProduct(product);
    console.log(product);
  };

  return (
    <>
      <div className="carousel">
        <>
          <h2 className="carousel__title">Productos destacados</h2>
          <Slider
            className="carousel__slider"
            {...settings}
            draggable={false}>
            {products.productos && products.productos.map((product) => (
              <div
                key={product.id}
                className="carousel__slide"
                onClick={() => handleProductClick(product)}
              >
                {products.images && products.images.map((image) => {
                  return image.product_id === product.id ? (
                    <img
                      key={image.product_id}
                      className="carousel__image"
                      src={image.url}
                      alt={product.title}
                    />
                  ) : "";
                })}
                <h3 className="carousel__subtitle">{product.name}</h3>
                <p className="carousel__price">${product.price}</p>
                <Button product={product} />
              </div>
            ))}
          </Slider>
        </>
      </div>
    </>
  );
};

export default Carousel;


const rootElement = document.getElementById('carousel');
if (rootElement) {
  ReactDOM.createRoot(rootElement).render(<Carousel />);
}
