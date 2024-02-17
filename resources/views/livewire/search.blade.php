<div class="flex-1 relative" x-data>

    <form action="{{route('search')}}" autocomplete="off">
        <x-input name="name" wire:model="search" type="text" class="w-full" placeholder="¿Estas buscando algun producto"></x-input>

        <button class="absolute top-0 right-0 w-12 h-full bg-orange-500 rounded-r-md flex items-center justify-center">
            <x-search size="35" color="white" />
        </button>


    </form>
    <div class="absolute w-full  shadow rounded-lg mt-1 hidden" :class="{'hidden':!$wire.open}"
        @click.away="$wire.open=false">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                <a href="{{route('products.show',$product)}}" class="flex">
                    <img class="w-16 h-12 object-cover" src="{{Storage::url($product->images->first()->url)}}" alt="">
                    <div class="ml-4 text-gray-700">
                        <p class="text-md font-semibold leading-5">{{$product->name}}</p>
                        <p>Categoria:{{$product->subcategory->category->name}}</p>
                    </div>
                </a>
                @empty
                <p class="text-md  leading-5">No existe ningun registro con los parametros especificados</p>
                @endforelse
            </div>
        </div>
    </div>
</div>