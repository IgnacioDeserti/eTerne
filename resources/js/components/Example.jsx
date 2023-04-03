import React from 'react';
import ValidationErrors from './ValidationErrors';

const LoginBox = (props) => {
    return (
        <div className="login-box">
            <ValidationErrors className="mb-4" />

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
                    <div className="mt-4">
                        <label htmlFor="terms" className="flex items-center">
                            <input type="checkbox" name="terms" id="terms" required />
                            <div className="">
                                {props.terms_of_service}
                                {props.privacy_policy}
                            </div>
                        </label>
                    </div>
                @endif

                <div>
                    <a className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {props.already_registered}
                    </a>
                </div>
            </form>
        </div>
    )
}

export default LoginBox;
