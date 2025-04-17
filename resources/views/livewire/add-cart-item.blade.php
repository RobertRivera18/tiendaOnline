<div x-data>
    

    <p class="text-gray-700 my-4">
        <span class="font-semibold text-lg">Stock Disponible:</span>
        @if ($quantity)
            {{ $quantity }}
        @else
            {{ $product->stock }}
        @endif

    </p>


    <div class="flex space-x-4 mt-8 mb-4">
        <div class="flex-shrink-0">
            <div class="flex items-center space-x-6">

                <div class="mr-4">
                    <x-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading-attr="disabled"
                        wire:target="decrement" wire:click="decrement">
                        -
                    </x-secondary-button>
                    <span class="mx-2 text-gray-700">{{ $qty }}</span>
                    <x-secondary-button x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading-attr="disabled"
                        wire:target="increment" wire:click="increment">
                        +
                    </x-secondary-button>
                </div>
            </div>
        </div>


        <div class="flex-1">
            <button
                class="outline-none inline-flex justify-center items-center group hover:shadow-sm focus:ring-offset-background-white dark:focus:ring-offset-background-dark transition-all ease-in-out duration-200 focus:ring-2 disabled:opacity-80 disabled:cursor-not-allowed text-white bg-green-500 dark:bg-green-700 hover:text-white hover:bg-green-600 dark:hover:bg-green-600 focus:text-white focus:ring-offset-2 focus:bg-green-600 focus:ring-green-600 dark:focus:bg-green-600 dark:focus:ring-green-600 rounded-md gap-x-2 text-sm px-4 py-2 w-full"
                x-bind:disabled="!$wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
                wire:target="addItem">

                Agregar al carrito


                <svg class="w-4 h-4 shrink-0 animate-spin" wire:loading="true" wire:target="add_to_cart"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </button>

        </div>


    </div>
    <div class="grid lg:grid-cols-2 gap-6 mt-8">

        <div class="flex items-center border rounded-2xl p-6">
            <i class="fas fa-truck text-3xl text-gray-700"></i>

            <p class="ml-4">
                <span>
                    Despacho a domicilio
                </span>
                <br>
                <span class="text-sm text-green-500">
                    Disponible
                </span>
            </p>
        </div>

        <div class="flex items-center border rounded-2xl p-6">
            <i class="fas fa-store text-3xl text-gray-700"></i>
            <p class="ml-4">
                <span>
                    Retiro en tienda
                </span>
                <br>
                <span class="text-sm text-green-500">
                    Disponible
                </span>
            </p>
        </div>
        
    </div>
</div>
