// Función para realizar la petición a la API y obtener los productos
function fetchProducts() {
  return fetch("https://fakestoreapi.com/products")
    .then((response) => response.json());
}

// Función para crear el elemento DOM para un producto individual
function createProductElement(product) {
  const productDiv = document.createElement("div");
  productDiv.className = "product";

  const img = document.createElement("img");
  img.src = product.image;
  img.alt = product.title;
  productDiv.appendChild(img);

  const h2 = document.createElement("h2");
  h2.textContent = product.title;
  productDiv.appendChild(h2);

  const priceP = document.createElement("p");
  priceP.className = "price";
  priceP.textContent = `$ ${parseFloat(product.price).toFixed(2)}`;
  productDiv.appendChild(priceP);

  const button = document.createElement("button");
  button.textContent = "Mostrar descripción";
  button.onclick = () => {
    window.location.href = `/productDetailViewLink/${product.id}`;
  };
  productDiv.appendChild(button);

  return productDiv;
}

// Función para renderizar la sección de productos en el DOM
function renderProductsSection(products) {
  const productsSection = document.getElementById("products-section");
  productsSection.className = "products-section";

  products.forEach((product) => {
    const productElement = createProductElement(product);
    productsSection.appendChild(productElement);
  });
}

// Inicialización: obtener productos y renderizar la sección de productos
fetchProducts().then((products) => {
  renderProductsSection(products);
});