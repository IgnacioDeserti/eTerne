/* const main_img = document.querySelector('.main_img');
const thumbnails = document.querySelectorAll('.thumbnail');
const productsContainer = document.querySelector('.products-container');

thumbnails.forEach(thumb => {
    thumb.addEventListener('click', function () {
        const active = document.querySelector('.active');
        active.classList.remove('active');
        this.classList.add('active');
        main_img.src = this.src;
    });
}); */

const fetchProduct = async (productId) => {
    try {
        const response = await fetch(`http://localhost:8000/productosReact`);
        const productData = await response.json();
        productData.productos.forEach(function (product) {
            if (product.id === productId) {
                console.log(product)
                if (productData.images) {
                    productData.images.forEach(function (image) {
                        if (image.product_id === productId) {
                            console.log(image.url)
                            let galleryProduct = document.getElementById("galleryProduct")
                            let img = document.createElement('img');
                            img.setAttribute('key', image.product_id);
                            img.setAttribute('class', 'product-details__image');
                            img.setAttribute('src', image.url);
                            img.setAttribute('alt', product.name);
                            galleryProduct.appendChild(img);
                        }
                    });
                }
            }
        });
    } catch (error) {
        console.error(error);
    }
};

const productId = window.productId;
fetchProduct(productId);
