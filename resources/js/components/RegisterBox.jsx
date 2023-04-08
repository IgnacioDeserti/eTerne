import React from 'react';
import ReactDOM from 'react-dom/client';

const RegisterBox = () => {
    return (
        <>
            <h3>Registrarse</h3>
            <div className="user-box">
                <input
                    id='name'
                    type="text"
                    name="name"
                    required autoFocus autoComplete="name"
                    placeholder="Nombre"
                />
            </div>
            <div className="user-box">
                <input
                    type="email"
                    name="email"
                    required=""
                    placeholder="Email"
                />
            </div>
            <div className="user-box">
                <input
                    type="password"
                    name="password"
                    required=""
                    placeholder="Contraseña"
                />
            </div>
            <div className="user-box">
                <input
                    type="password"
                    name="password_confirmation"
                    required=""
                    placeholder="Repetir contraseña"
                />
            </div>
            <button className="btnGeneral" type="submit" >
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Registrarse
            </button>
        </>
    );
};

export default RegisterBox;

const rootElement = document.getElementById('register-box');
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<RegisterBox />);
}
