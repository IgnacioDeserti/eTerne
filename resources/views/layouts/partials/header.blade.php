<div id="menu-container">
    <header class="Cabecera">
        <nav class="Cabecera-nav">
            <ul class="Cabecera-ul">
                    <a class="Cabecera-li" href="{{ route('productos.index') }}"
                        class="{{ request()->routeIs('productos.index') ? 'active' : '' }}">Productos</a>

                    <a class="Cabecera-li" href="{{ route('contactanos.index') }}"
                        class="{{ request()->routeIs('contactanos.index') ? 'active' : '' }}">Contactanos</a>

                    <a class="Cabecera-li" href="{{ route('categories.index') }}"
                        class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">Categorias</a>
            </ul>
        </nav>
        <button class="Cabecera-button">
            <i class="fa fa-bars"></i>
        </button>
    </header>
</div>
