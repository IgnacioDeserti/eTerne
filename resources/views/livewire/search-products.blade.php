<div class="container-products">
    <div class="search-container">
        <input type="text" placeholder="Buscar Producto" wire:model="search" class="search-input">
    </div>
    <table class="products-table">
        <thead>
            <tr>
                <th scope="col" class="product-id">
                    ID
                </th>
                <th scope="col" class="product-name">
                    Nombre
                </th>
                <th scope="col" class="product-price">
                    Precio
                </th>
                <th scope="col" class="product-stock">
                    Marca
                </th>
                <th scope="col" class="product-category">
                    Categoria
                </th>
                <th scope="col" class="product-actions">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        <div class="product-id">
                            {{ $product->id }}
                        </div>
                    </td>
                    <td>
                        <div class="product-name">
                            {{ $product->name }}
                        </div>
                    </td>
                    <td>
                        <div class="product-price">
                            {{ $product->price }}
                        </div>
                    </td>
                    <td>
                        <div class="product-stock">
                            {{ $product->brand }}
                        </div>
                    </td>
                    <td>
                        <div class="product-category">
                            <?php
                            $categoriaEncontrada = array_filter($categories->toArray(), function ($categoria) use ($product) {
                                return $categoria['id'] === $product->idCategory;
                            });
                            if (!empty($categoriaEncontrada)) {
                                // La función reset retorna el primer elemento del array filtrado
                                $categoria = reset($categoriaEncontrada);
                                echo $categoria['name'];
                            }
                            ?>
                        </div>
                    </td>
                    <td class="product-actions">
                        <a href="{{ route('productos.show', $product) }}"><button class="btn-ver">Ver
                                Producto</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-container">
        {{ $products->links() }}
    </div>
</div>
