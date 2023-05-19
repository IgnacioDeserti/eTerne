import React, { useState, useEffect, useRef, useContext } from 'react';
import ReactDOM from 'react-dom/client';

function SearchBar() {
    const [searchInput, setSearchInput] = useState('');
    const [searchResults, setSearchResults] = useState([]);
    const [noResults, setNoResults] = useState(false);
    const searchContainerRef = useRef(null);
    function handleInputChange(event) {
        const { value } = event.target;
        setSearchInput(value);
        // Consulta productos que coincidan con la cadena de búsqueda
        fetch(`http://localhost:8000/productosReact?name_like=${value}`)
            .then(response => response.json())
            .then(data => {
                // Filtra los productos según la entrada actual del usuario:
                const regex = new RegExp(value, 'i');
                const filteredData = data.productos.filter(product => regex.test(product.name));
                // Establece el estado de `noResults` según si hay o no resultados coincidentes:
                if (filteredData.length === 0) {
                    setNoResults(true);
                } else {
                    setNoResults(false);
                }
                // Agrega las imágenes a los productos filtrados:
                filteredData.forEach(product => {
                    const image = data.images.find(image => image.product_id === product.id);
                    if (image) {
                        product.image = image.url;
                    }
                });
                // Actualiza el estado de `searchResults` con los productos filtrados:
                setSearchResults(filteredData);
            });
    }
    useEffect(() => {
        function handleClickOutside(event) {
            if (searchContainerRef.current && !searchContainerRef.current.contains(event.target)) {
                // Borra la entrada de búsqueda y los resultados de búsqueda:
                setSearchInput('');
                setSearchResults([]);
                setNoResults(false);
            }
        }
        // Agrega el controlador de eventos para detectar clics fuera del contenedor de búsqueda:
        document.addEventListener('mousedown', handleClickOutside);
        return () => {
            // Limpia el controlador de eventos al desmontar el componente:
            document.removeEventListener('mousedown', handleClickOutside);
        };
    }, [searchContainerRef]);
    return (
        <div className='buscador buscador-container' ref={searchContainerRef}>
            <input
                type='text'
                placeholder='Buscar productos...'
                value={searchInput.length > 0 ? searchInput : ''}
                onChange={handleInputChange}
            />
            {/* Renderiza resultados coincidentes debajo de la barra de búsqueda: */}
            {searchInput.length > 0 &&
                <ul>
                    {searchResults.map(product => (
                        // Muestra el enlace a la página de detalles del producto:
                        <li key={product.id} className='product-item' onClick={() => window.location.href = `http://localhost:8000/clientShowCarousel/${product.id}`}>
                            {/* Muestra una imagen y el título del producto: */}
                            <img src={product.image} alt={`${product.name}`} className='product-image' />
                            <div className='product-info'>
                                <h3>{product.name}</h3>
                            </div>
                        </li>
                    ))}
                    {/* Si no hay resultados coincidentes, muestra un mensaje de "Producto no encontrado": */}
                    {noResults && (
                        <li className='no-results'>Producto no encontrado</li>
                    )}
                </ul>
            }
        </div>
    );
}

export default SearchBar;

const rootElement = document.getElementById('searchBar');
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<SearchBar />);
}
