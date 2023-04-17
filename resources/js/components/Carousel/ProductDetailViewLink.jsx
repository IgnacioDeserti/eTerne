import React from 'react';

const ProductDetailViewLink = ({ product }) => {
  const handleViewDetails = () => {
    // abrir el detalle de ese producto en una pestaña nueva
    window.open(`/product/${product.id}`);
  };

  const handleGoBack = () => {
    window.history.back();
  };

  return (
    <>
      <BackButton onClick={handleGoBack} />
      <div className="product-details">
        <img
          className="product-details__image"
          src={product.image}
          alt={product.title}
        />
        <div className="product-details__info">
          <h1 className="product-details__title">{product.title}</h1>
          <p className="product-details __description">{product.description}</p>
          <div className="product-details__price-container">
            <p className="product-details__price">Precio:</p>
            <span className="product-details__currency">$</span>
            <span className="product-details__value">{product.price}</span>
          </div>
          <button className="product-details__buy-button" onClick={handleViewDetails}>
            Comprar
          </button>
        </div>
      </div>
    </>
  );
};

export default ProductDetailViewLink;
