<div class="container-products">
    <div class="search-container">
        <input type="text" placeholder="Buscar Categoria" wire:model="search">
    </div>
    <table>
        <table class="products-table">
            <thead>
                <tr>
                    <th scope="col" class="product-id">
                        ID
                    </th>
                    <th scope="col" class="product-name">
                        Nombre
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            <div class="product-id">
                                {{ $category->id }}
                            </div>
                        </td>
                        <td>
                            <div class="product-name">
                                {{ $category->name }}
                            </div>
                        </td>
                        <td class="product-actions">
                            <a href="{{ route('categories.show', $category->id) }}"><button
                                    class="btn-ver espacioBtn">Ver
                                    categoria</button></a>
                            <a href="{{ route('categories.filterProducts', $category->id) }}"><button
                                    class="btn-ver espacioBtn">Ver productos
                                    de esta categoria</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </table>
</div>
