@extends('layouts.register')

<x-guest-layout>
    <x-validation-errors class="mb-4" />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form class="general-box" method="POST" action="{{ route('login') }}">
        @csrf

        <div id="login-box"></div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
<div class="flex items-center justify-end mt-4 align-middle ">
    <a href="{{ route('auth.google') }}">
        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
            style="margin-left: 3em;">
    </a>
</div>
