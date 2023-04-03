@extends('layouts.register')

<div class="login-box">
    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h3>Inicio de sesión</h3>
        <form>
            <div class="user-box">
                <input type="text" name="" required="">
                <label>Correo</label>
            </div>
            <div class="user-box">
                <input type="password" name="" required="">
                <label>Contraseña</label>
            </div>
            <a href="#" class="btnIniciar">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Iniciar
            </a>
        </form>

        <div class="containerPrivacyPolicy">
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="containerFlex">
                    <input class="checkBox" name="terms" id="terms" type="checkbox" required />
                    <label for="terms">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '">' . __('Terms of Service') . '</a>',
                            'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '">' . __('Privacy Policy') . '</a>',
                        ]) !!}
                    </label>
                </div>
            @endif

            <div class="alreadyRegistered">
                <a class="" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </div>
    </form>
</div>
