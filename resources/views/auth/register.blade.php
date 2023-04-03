@extends('layouts.app')

@section('content')
    <div id="login"></div>

    <!-- React component -->
    <script type="module">
        import React from 'react';
        import ReactDOM from 'react-dom';
        import LoginBox from './components/LoginBox';

        ReactDOM.render(
            <LoginBox
                route_register="{{ route('register') }}"
                route_terms="{{ route('terms.show') }}"
                route_policy="{{ route('policy.show') }}"
                register="{{ __('Register') }}"
                login="{{ __('Login') }}"
                already_registered="{{ __('Already registered?') }}"
                privacy_policy="{{ __('Privacy Policy') }}"
                terms_of_service="{{ __('Terms of Service') }}"
            />,
            document.getElementById('login')
        );
    </script>
@endsection
