<div class="container mx-auto p-4">

    {{-- Header de la categoría --}}
    <div class="bg-white rounded-lg shadow-lg p-4 flex justify-between items-center mb-6">
        <h1 class="font-semibold text-gray-700 flex items-center gap-2">
            <i>{!! $category->icon !!}</i> {{ $category->name }}
        </h1>
        <div class="hidden md:flex border border-gray-200 divide-x divide-gray-200 text-gray-500">
            <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-orange-500' : '' }}" wire:click="$set('view', 'grid')"></i>
            <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-orange-500' : '' }}" wire:click="$set('view', 'list')"></i>
        </div>
    </div>

    {{-- Grid general --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        {{-- Filtros --}}
        <div class="col-span-1">
            <form wire:submit.prevent="filtrar">
                {{-- Ordenar por --}}
                <div class="mb-4">
                    <p class="text-lg font-semibold">Ordenar por</p>
                    <x-select wire:model.defer="order">
                        <option value="new">Más recientes</option>
                        <option value="old">Más antiguos</option>
                    </x-select>
                </div>
        
                {{-- Subcategorías --}}
                <div class="mb-4">
                    <p class="text-lg font-semibold">Subcategorías</p>
                    <ul>
                        @foreach ($category->subcategories as $subcategory)
                            <li>
                                <label>
                                    <x-checkbox wire:model.defer="subcategoria" value="{{ $subcategory->slug }}" />
                                    <span class="ml-2 text-gray-700 capitalize">{{ $subcategory->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
        
                {{-- Marcas --}}
                <div class="mb-4">
                    <p class="text-lg font-semibold">Marcas</p>
                    <ul>
                        @foreach ($category->brands as $brand)
                            <li>
                                <label>
                                    <x-checkbox wire:model.defer="marca" value="{{ $brand->name }}" />
                                    <span class="ml-2 text-gray-700 capitalize">{{ $brand->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
        
                {{-- Botón aplicar filtros --}}
                <x-button type="submit" class="w-full mt-4">Aplicar Filtros</x-button>
            </form>
        </div>

        {{-- Productos --}}
        <div class="md:col-span-3">
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($products as $product)
                        <li class="bg-white rounded-lg shadow-md overflow-hidden">
                            <a href="{{ route('products.show', $product) }}">
                                <img class="h-40 w-full object-cover" src="{{ Storage::url($product->images->first()->url) }}" alt="{{ $product->name }}">
                            </a>
                            <div class="p-4">
                                <h1 class="text-md font-semibold">
                                    <a href="{{ route('products.show', $product) }}">
                                        {{ Str::limit($product->name, 20) }}
                                    </a>
                                </h1>
                                <p class="font-bold text-gray-700">US$ {{ $product->price }}</p>
                            </div>
                        </li>
                    @empty
                        <li class="col-span-full">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center">
                                <strong class="font-bold">¡Ups!</strong>
                                <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            @else
                <ul>
                    @forelse($products as $product)
                        <x-products-list :product="$product" />
                    @empty
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center">
                            <strong class="font-bold">¡Ups!</strong>
                            <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                        </div>
                    @endforelse
                </ul>
            @endif

            {{-- Paginación --}}
            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
