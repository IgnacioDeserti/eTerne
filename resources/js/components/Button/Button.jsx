import React from "react";

function Button({ product }) {
    return (
        <button onClick={() => window.location.href = `http://localhost:8000/clientShowCarousel/${product.id}`}>
            Mostrar descripción
        </button>
    );
}

export default Button;