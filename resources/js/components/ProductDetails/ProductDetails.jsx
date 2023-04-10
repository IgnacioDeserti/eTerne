import { useState, useEffect } from "react";

const ProductDetails = ({ productId }) => {
    const [product, setProduct] = useState(null);

    useEffect(() => {
        fetch(`https://fakestoreapi.com/products/${productId}`)
            .then((res) => res.json())
            .then((data) => setProduct(data));
    }, [productId]);

    if (!product) {
        return <div>Cargando...</div>;
    }

    return (
        <div className="product-details">
            <img src={product.image} alt={product.title} />
            <h1>{product.title}</h1>
            <p>{product.description}</p>
            <p>Precio: {product.price}$</p>
            <button>Agregar al carrito</button>
        </div>
    );
};

export default ProductDetails;
