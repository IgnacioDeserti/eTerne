import React, { useState } from "react";

const ProductDetail = ({ product }) => {
  const [showDescription, setShowDescription] = useState(false);

  const handleShowDescription = () => {
    setShowDescription(!showDescription);
  }

  return (
    <div className={`product-detail`}>
      <button onClick={handleShowDescription}>
        {showDescription ? "Ocultar descripción" : "Mostrar descripción"}
      </button>
      <p className={`description ${showDescription ? "show" : ""}`}>
        {product.description}
      </p>
    </div>
  );
};

export default ProductDetail;
