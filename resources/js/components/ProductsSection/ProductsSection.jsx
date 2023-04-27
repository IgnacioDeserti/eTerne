// Obtener la referencia al elemento <div> en el que renderizaremos los productos
const productsElement = document.getElementById('products-section');

// Crear una función para hacer la petición con fetch
function fetchProducts() {
  fetch('http://localhost:8000/productosReact')
    .then(function(response) {
      return response.json();
    })
    .then(function(product) {
      renderProductsSection(product);
    })
    .catch(function(error) {
      console.error(error);
    });
}

// Función para crear el elemento DOM para un producto individual
function createProductElement(product, images) {
  // Crear los elementos DOM necesarios para un producto individual
  const productElement = document.createElement('div');
  const nameElement = document.createElement('h2');
  const descriptionElement = document.createElement('p');
  const priceElement = document.createElement('span');

  // Configurar las propiedades de los elementos creados
  nameElement.textContent = product.name;
  descriptionElement.textContent = product.description;
  priceElement.textContent = product.price;

  // Agregar los elementos creados al elemento del producto
  productElement.appendChild(nameElement);
  productElement.appendChild(descriptionElement);
  productElement.appendChild(priceElement);

  // Crear y agregar los elementos de imagen para el producto actual
  for(let i = 0; i < images.length; i++){
    const imageElement = document.createElement('img');
    imageElement.src = images[i].url;
    productElement.appendChild(imageElement);
  }

  return productElement;
}
// Función para renderizar la sección de productos en el DOM
function renderProductsSection(products) {
  // Crear un fragmento de documento para agregar todos los elementos de producto a la vez
  const productsFragment = document.createDocumentFragment();
  // Crear y agregar elementos individuales para cada producto
  for (let i = 0; i < products.productos.length; i++) {
    const images = [];
    const product = products.productos[i];
    for(let j = 0; j < products.images.length; j++){
      if(product.id == products.images[j].product_id){
        const image = products.images[j];
        images.push(image);
      }
    }
    const productElement = createProductElement(product, images);

    productsFragment.appendChild(productElement);
  }

  // Agregar todos los elementos de producto al elemento contenedor en el DOM
  productsElement.appendChild(productsFragment);
}

// Llamar a la función fetchProducts() cuando la página termina de cargar
window.addEventListener('load', function() {
  fetchProducts();
});