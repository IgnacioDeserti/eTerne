@extends('layouts.register')

<x-validation-errors class="mb-4" />

<form class="general-box" method="POST" action="{{ route('register') }}">
    @csrf
    <div id="register-box"></div>
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
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>

        <div class="flex items-center justify-end mt-4 align-middle ">
            <a href="{{ route('auth.google') }}">
                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                    style="margin-left: 3em;">
            </a>
        </div>
    </div>
</form>
