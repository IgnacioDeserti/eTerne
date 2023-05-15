<div>
    <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- component -->
        <x-table>
            <div class="px-6 py-4">
                <input type="text" wire:model="search">
            </div>

            <table class="min-w-full">
                <thead class="bg-white border-b">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            ID
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Nombre
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Precio
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Stock
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Categoria
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="text-sm text-gray-900">
                                    {{ $product->id }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="text-sm text-gray-900">
                                    {{ $product->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="text-sm text-gray-900">
                                    {{ $product->price }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="text-sm text-gray-900">
                                    {{ $product->stock }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="text-sm text-gray-900">
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div>
                                    <a href="{{ route('productos.show', $product) }}"><button>Ver Producto</button></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-table>
    </div>

    <div class="card-footer">
        {{ $products->links() }}
    </div>

</div>