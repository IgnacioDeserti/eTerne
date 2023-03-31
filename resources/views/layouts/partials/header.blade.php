<header>
    <h1>menu</h1>
    <nav>
        
        <div class="containerNav">
            <ul class="ulNav">
                <li class="liNav">
                    <a class="aNav" href="{{route('productos.index')}}" class="{{request()->routeIs('productos.index') ? 'active' : ''}}">Productos</a>
                </li>

                <li class="liNav">
                    <a class="aNav" href="{{route('contactanos.index')}}" class="{{request()->routeIs('contactanos.index') ? 'active' : ''}}">Contactanos</a>
                </li>

            </ul>
        </div>
    </nav>
</header>