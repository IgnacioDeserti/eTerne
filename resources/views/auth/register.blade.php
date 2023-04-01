@extends('layouts.register')


<div class="login-box">
        <x-validation-errors class="mb-4"/> <!-- dejo -->

        <form method="POST" action="{{ route('register') }}">
            @csrf <!-- dejo -->

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
            

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class=""> <!-- hacer clase -->
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div> <!-- hacer clase -->
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
</div>
