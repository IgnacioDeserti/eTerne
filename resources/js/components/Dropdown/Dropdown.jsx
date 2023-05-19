import React, { useState, useRef, useEffect } from 'react';
import ReactDOM from 'react-dom/client';

const Dropdown = () => {
    const [isOpen, setIsOpen] = useState(false);
    const categories = window.categories || [];
    const ref = useRef(null);

    const handleToggle = () => setIsOpen(!isOpen);

    const handleClickOutside = (event) => {
        if (ref.current && !ref.current.contains(event.target)) {
            setIsOpen(false);
        }
    };

    useEffect(() => {
        document.addEventListener('click', handleClickOutside, true);
        return () => {
            document.removeEventListener('click', handleClickOutside, true);
        };
    }, []);

    return (
        <div className="dropdown" ref={ref}>
            <button
                className={`dropdown__toggle Cabecera-li ${isOpen ? 'open' : ''}`}
                onClick={handleToggle}
            >
                Categories
            </button>
            {isOpen && (
                <ul className={`dropdown__menu ${isOpen ? 'open' : ''}`}>
                    {categories.map((category, index) => (
                        <li
                            key={category.id}
                            className={`dropdown__item ${isOpen ? 'visible' : ''}`}
                            style={{ transitionDelay: `${index * 0.1}s` }}
                        >
                            <a href={`/home/productsByCategory/${category.id}`} className="dropdown__link">
                                {category.name}
                            </a>
                        </li>
                    ))}
                </ul>
            )}
        </div>
    );
};

export default Dropdown;

const rootElement = document.getElementById('dropDown');
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<Dropdown />);
}