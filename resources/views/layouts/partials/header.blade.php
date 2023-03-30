<header>
    <h1>menu</h1>
    <nav>
        
        
        <li><a href="{{route('productos.index')}}" class="{{request()->routeIs('productos.index') ? 'active' : ''}}">Productos</a>
            @dump(request()->routeIs('productos.index'))
        </li>

        <li>
            <a href="{{route('contactanos.index')}}" class="{{request()->routeIs('contactanos.index') ? 'active' : ''}}">Contactanos</a>
        </li>

    </nav>
</header>