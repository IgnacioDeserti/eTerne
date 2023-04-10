import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';
import { faBars } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

function HamburgerMenu() {
    const [isOpen, setIsOpen] = useState(false);

    // Lista de objetos que representan los elementos de tu menú
    const menuItems = [
        { label: "Nosotros", link: "#" },
        { label: "Log in", link: "login" },
        { label: "Register", link: "register" }
    ];

    return (
        <nav className="hamburger-menu">
            {/* Botón hamburguesa */}
            <button
                className="menu-toggle"
                onClick={() => setIsOpen(!isOpen)}
                aria-label="Menu"
            >
                <FontAwesomeIcon icon={faBars} />
            </button>

            {/* Contenedor que muestra el menú completo */}
            <div className={`nav-links ${isOpen ? "open" : ""}`}>
                {menuItems.map(item => (
                    <a key={item.label} href={item.link}>
                        {item.label}
                    </a>
                ))}
            </div>
        </nav>
    );
}

export default HamburgerMenu;


const rootElement = document.getElementById('menu-container');
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<HamburgerMenu />);
}