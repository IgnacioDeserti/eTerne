import React, { useState } from 'react';
const FilterBar = ({ onFilterChange }) => {
    const [category, setCategory] = useState("");
    const [minPrice, setMinPrice] = useState("");
    const [maxPrice, setMaxPrice] = useState("");

    const handleFilterChange = () => {
        onFilterChange({
            category,
            minPrice: minPrice ? Number(minPrice) : 0,
            maxPrice: maxPrice ? Number(maxPrice) : Infinity,
        });
    };

    return (
        <div className="filter-bar">
            <h3>Filtrar por:</h3>
            <label>
                Categoría:
                <input
                    type="text"
                    value={category}
                    onChange={(e) => setCategory(e.target.value)}
                />
            </label>
            <label>
                Precio mínimo:
                <input
                    type="number"
                    value={minPrice}
                    onChange={(e) => setMinPrice(e.target.value)}
                />
            </label>
            <label>
                Precio máximo:
                <input
                    type="number"
                    value={maxPrice}
                    onChange={(e) => setMaxPrice(e.target.value)}
                />
            </label>
            <button onClick={handleFilterChange}>Aplicar filtros</button>
        </div>
    );
};

export default FilterBar;