// Función para obtener el ID del producto de la URL
if (productId) {
  fetchProduct(productId)
    .then((product) => {
      renderProductDetails(product, modoOscuro);
    })
    .catch(console.error);
} else {
  document.getElementById("product-details").textContent = "Cargando...";
}

// Función para realizar la petición a la API y obtener el producto
function fetchProduct(id) {
  return fetch(`https://fakestoreapi.com/products/${id}`)
    .then((response) => response.json());
}

// Función para manejar la adición del producto al carrito
function handleOnAdd() {
  // Aquí puede agregar la lógica para actualizar la cantidad de productos en el carrito
}

// Función para crear el elemento DOM para la vista detallada del producto
function createProductDetailsElement(product) {
  const productDetailsDiv = document.createElement("div");
  productDetailsDiv.className = `product-details`;

  const img = document.createElement("img");
  img.className = "product-details__image";
  img.src = product.image;
  img.alt = product.title;
  productDetailsDiv.appendChild(img);

  const infoDiv = document.createElement("div");
  infoDiv.className = "product-details__info";
  productDetailsDiv.appendChild(infoDiv);

  const h1 = document.createElement("h1");
  h1.className = "product-details__title";
  h1.textContent = product.title;
  infoDiv.appendChild(h1);

  const descriptionP = document.createElement("p");
  descriptionP.className = "product-details__description";
  descriptionP.textContent = product.description;
  infoDiv.appendChild(descriptionP);

  const priceContainerDiv = document.createElement("div");
  priceContainerDiv.className = "product-details__price-container";
  infoDiv.appendChild(priceContainerDiv);

  const priceP = document.createElement("p");
  priceP.className = "product-details__price";
  priceP.textContent = "Precio:";
  priceContainerDiv.appendChild(priceP);

  const currencySpan = document.createElement("span");
  currencySpan.className = "product-details__currency";
  currencySpan.textContent = "$";
  priceContainerDiv.appendChild(currencySpan);

  const valueSpan = document.createElement("span");
  valueSpan.className = "product-details__value";
  valueSpan.textContent = product.price;
  priceContainerDiv.appendChild(valueSpan);

  const itemCountDiv = document.createElement("div");
  infoDiv.appendChild(itemCountDiv);

  const addToCartButton = document.createElement("button");
  addToCartButton.textContent = "Agregar al carrito";
  addToCartButton.onclick = handleOnAdd;
  itemCountDiv.appendChild(addToCartButton);

  const checkoutLink = document.createElement("a");
  checkoutLink.href = "/cart";
  checkoutLink.textContent = "Terminar Compra";
  itemCountDiv.appendChild(checkoutLink);

  return productDetailsDiv;
}

// Función para renderizar la vista detallada del producto en el DOM
function renderProductDetails(product, modoOscuro) {
  const productDetails = document.getElementById("product-details");
  const productDetailsElement = createProductDetailsElement(product, modoOscuro);
  productDetails.appendChild(productDetailsElement);
}

// Inicialización: obtener el ID del producto y renderizar la vista detallada del producto
const productId = getProductIdFromUrl();
const modoOscuro = false; // Cambiar según la preferencia del usuario

if (productId) {
  fetchProduct(productId)
    .then((product) => {
      renderProductDetails(product, modoOscuro);
    })
    .catch(console.error);
} else {
  document.getElementById("product-details").textContent = "Cargando...";
}