const main_img = document.querySelector('.main_img');
const thumbnails = document.querySelectorAll('.thumbnail');
const productsContainer = document.querySelector('.products-container');

thumbnails.forEach(thumb => {
    thumb.addEventListener('click', function () {
        const active = document.querySelector('.active');
        active.classList.remove('active');
        this.classList.add('active');
        main_img.src = this.src;
    });
});

const fetchProduct = async (productId) => {
    const url = `http://localhost:8000/productosReact/${productId}`;
    try {
        const response = await fetch(url);
        const productData = await response.json();
        console.log(productData);
        // Recorremos cada producto y creamos un div con su información
        productsData.forEach(product => {
            const productDiv = document.createElement('div');
            const image = document.createElement('img');
            image.src = product.image;
            const name = document.createElement('h2');
            name.innerText = product.name;
            const price = document.createElement('p');
            price.innerText = product.price;
            productDiv.appendChild(image);
            productDiv.appendChild(name);
            productDiv.appendChild(price);
            productsContainer.appendChild(productDiv);
        });
    } catch (error) {
        console.error(error);
    }
};

const productId = window.productId;
fetchProducts(productId);
