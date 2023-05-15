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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="text-sm text-gray-900">
                                    {{ $category->id }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div class="text-sm text-gray-900">
                                    {{ $category->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <div>
                                    <a href="{{ route('categories.show', $category->id) }}"><button>Ver categoria</button></a>
                                </div>
                                <div>
                                    <a href="{{ route('categories.filterProducts', $category->id)}}"><button>Ver productos de esta categoria</button></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-table>
    </div>

    <div class="card-footer">
        {{ $categories->links() }}
    </div>

</div>
