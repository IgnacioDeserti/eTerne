import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';
import { Link } from 'react-router-dom';

function HamburgerMenu() {

    const [menu, setMenu] = useState(false);
    const [abierto, setAbierto] = useState(false);

    const toggleMenu = () => {
        setMenu(!menu);
    }

    function handleClick() {
        setAbierto(!abierto);
    }

    return (
        <header className={`Cabecera ${menu ? 'Active' : ''}`}>
            {/*<li><CartWidget /></li>*/}
            <div className='containerBuscador'>
                <form className='buscador'>
                    <input type="text" placeholder="Buscar productos..." />
                    <button className='submit' type="submit">Buscar</button>
                </form>
            </div>
            <button onClick={() => { toggleMenu(); handleClick(); }} className={`Cabecera-button ${abierto ? "menuAbierto" : ''}`}>
                <i className={`fa ${menu ? 'fa-times' : 'fa-bars'}`}></i>
            </button>
            <nav className={`Cabecera-nav ${menu ? 'isActive' : ''}`}>
                <ul className="Cabecera-ul">
                    <li className="Cabecera-li"><Link to='/'>Inicio</Link></li>
                    <li className="Cabecera-li"><Link to='/productsSection'>Productos</Link></li>
                    <li className="Cabecera-li"><a href="#a">Categoría</a></li>
                    <li className="Cabecera-li"><a href="#a">Categoría</a></li>
                </ul>
            </nav>
        </header>
    )
}

export default HamburgerMenu;


const rootElement = document.getElementById('menu-container');
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<HamburgerMenu />);
}