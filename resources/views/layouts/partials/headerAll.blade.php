<div id="menu-container">
    <header class="Cabecera">
        <div class="containerBuscador">
            <div id="searchBar"></div>
            <button class="Cabecera-button">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <nav class="Cabecera-nav">
            <ul class="Cabecera-ul">
                <div id="dropDown" class="Cabecera-li"></div>
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->hasRole('admin'))
                            <li class="Cabecera-li"><a href="{{ url('/dashboard') }}" class="Cabecera-a">Dashboard</a></li>
                        @endif
                        <li class="Cabecera-li"><a href="{{ route('profile.show') }}"
                                :active="request() - > routeIs('profile.show')" class="Cabecera-a">
                                {{ __('Profile') }}
                            </a></li>
                        <form class="Cabecera-li" method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <li><a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="Cabecera-a">
                                    {{ __('Log Out') }}
                                </a></li>
                        </form>
                    @else
                        <li class="Cabecera-li"><a href="{{ route('login') }}" class="Cabecera-a">Log in</a></li>
                        @if (Route::has('register'))
                            <li class="Cabecera-li"><a href="{{ route('register') }}" class="Cabecera-a">Register</a></li>
                        @endif
                    @endauth
                @endif
                <li class="Cabecera-li"><a href="{{ route('cart.index') }}" class="Cabecera-a">Carrito</a></li>
            </ul>
        </nav>
    </header>
    <script>
        window.categories = @json($categories);
    </script>
</div>
