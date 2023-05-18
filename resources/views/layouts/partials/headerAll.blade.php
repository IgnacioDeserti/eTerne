    <header class="Cabecera">
        <nav class="Cabecera-nav">
            <ul class="Cabecera-ul">
                <div id="dropDown"></div>
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->hasRole('admin'))
                            <a href="{{ url('/dashboard') }}" class="Cabecera-li">Dashboard</a>
                        @endif
                        <a href="{{ route('profile.show') }}" :active="request() - > routeIs('profile.show')"
                            class="Cabecera-li">
                            {{ __('Profile') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="Cabecera-li">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="Cabecera-li">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="Cabecera-li">Register</a>
                        @endif
                    @endauth
                @endif
                <a href="{{ route('cart.index') }}" class="Cabecera-li">Carrito</a>
            </ul>
        </nav>
        <button class="Cabecera-button">
            <i class="fa fa-bars"></i>
        </button>
    </header>
    <script>
        window.categories = @json($categories);
    </script>
