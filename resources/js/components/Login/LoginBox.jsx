import React from 'react';
import ReactDOM from 'react-dom/client';

const LoginBox = () => {
    return (
        <>
            <h3>Ingresar</h3>
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
            <button className="btnIniciar btnGeneral" type="submit" >
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Iniciar Sesion
            </button>
        </>
    );
};

export default LoginBox;

const rootElement = document.getElementById('login-box');
if (rootElement) {
    ReactDOM.createRoot(rootElement).render(<LoginBox />);
}
