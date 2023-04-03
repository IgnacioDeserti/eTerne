import React from 'react';
import ValidationErrors from './ValidationErrors';

const LoginBox = (props) => {
    return (
        <div className="login-box">
            <ValidationErrors className="" />

            <form method="POST" action={props.route_register}>
                @csrf

                <h3>Iniciar sesión</h3>
                <form>
                    <div className="user-box">
                        <input type="text" name="" required="" />
                        <label>Correo</label>
                    </div>
                    <div className="user-box">
                        <input type="password" name="" required="" />
                        <label>Contraseña</label>
                    </div>
                    <button className="btnIniciar" type="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        {props.login}
                    </button>
                </form>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <input type="checkbox" name="terms" id="terms" required />
                <div className="">
                    <label htmlFor="terms" className="">
                        {props.terms_of_service}
                        {props.privacy_policy}
                    </label>
                </div>
                @endif

                <div>
                    <a className="" href="{{ route('login') }}">
                        {props.already_registered}
                    </a>
                </div>
            </form>
        </div>
    )
}

export default LoginBox;
