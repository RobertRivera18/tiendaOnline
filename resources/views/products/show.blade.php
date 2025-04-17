<x-app-layout>
    <x-container class="px-4 my-4">
        {{-- Breadcrumb --}}
        <nav class="flex" aria-label="Breadcrumb">
            <ol
                class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse text-sm text-gray-700 dark:text-gray-400">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center hover:text-blue-600 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Inicio
                    </a>
                </li>

                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('categories.show', $product->subcategory->category->slug) }}"
                            class="hover:text-blue-600 dark:hover:text-white">
                            {{ $product->subcategory->category->name }}
                        </a>
                    </div>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="text-gray-500 dark:text-gray-400">
                            {{ $product->subcategory->name }}
                        </span>
                    </div>
                </li>
            </ol>
        </nav>
    </x-container>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Galería y Reseñas --}}
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img class="rounded-lg" src="{{ Storage::url($image->url) }}" alt="Imagen del producto">
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Reseñas --}}
                @can('review', $product)
                    <div class="text-gray-700 mt-6">
                        <h2 class="font-bold text-lg mb-2">Dejar una reseña</h2>
                        <form action="{{ route('reviews.store', $product) }}" method="POST">
                            @csrf
                            <textarea name="comment" id="editor" class="w-full mb-2"></textarea>
                            <x-input-error for="comment" />

                            <div class="flex items-center mt-2" x-data="{ rating: 5 }">
                                <p class="font-semibold mr-3">Puntaje:</p>
                                <ul class="flex space-x-2">
                                    <template x-for="i in 5" :key="i">
                                        <li :class="rating >= i ? 'text-yellow-500' : ''">
                                            <button type="button" class="focus:outline-none" x-on:click="rating = i">
                                                <i class="fas fa-star"></i>
                                            </button>
                                        </li>
                                    </template>
                                </ul>
                                <input type="hidden" name="rating" x-model="rating">
                                <x-button class="ml-auto">Agregar Reseña</x-button>
                            </div>
                        </form>
                    </div>
                @endcan

                @if ($product->reviews->isNotEmpty())
                    <div class="mt-6">
                        <h2 class="font-bold text-lg text-gray-700 mb-2">Reseñas</h2>
                        @foreach ($product->reviews as $review)
                            <div class="flex items-start mb-4">
                                <img class="w-10 h-10 rounded-full object-cover mr-4"
                                    src="{{ $review->user->profile_photo_url }}" alt="{{ $review->user->name }}">
                                <div class="flex-1">
                                    <p class="font-semibold">{{ $review->user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</p>
                                    <div class="mt-1">{!! $review->comment !!}</div>
                                </div>
                                <div class="ml-2 text-yellow-500">
                                    {{ $review->rating }} <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <hr class="border-gray-300">
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Información del producto --}}
            <div>
                <span
                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                    {{ $product->subcategory->name }}
                </span>

                <h1 class="text-2xl font-bold text-gray-800 mt-2">{{ $product->name }}</h1>

                <div class="flex justify-between items-center my-3">
                    <p class="text-zinc-700">
                        <span class="font-bold">Marca:</span>
                        <a href="#"
                            class="underline ml-1 hover:text-orange-500 capitalize">{{ $product->brand->name }}</a>
                    </p>

                    @php
                        $averageRating = $product->reviews->avg('rating') ?? 5;
                    @endphp

                    <div class="flex items-center space-x-1 text-sm text-yellow-500">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $averageRating >= $i ? '' : 'text-gray-300' }}"></i>
                        @endfor
                        <span class="ml-1 text-orange-500">({{ $product->reviews->count() }} reseñas)</span>
                    </div>
                </div>

                <span
                    class="inline-block text-sm font-semibold px-3 py-1 rounded bg-green-100 text-green-600 dark:bg-slate-700">
                    {{ $product->status == 2 ? 'Activo' : ($product->status == 1 ? 'Inactivo' : 'Desconocido') }}
                </span>

                <div class="mt-4 text-gray-800 prose max-w-none">
                    {!! $product->description !!}
                </div>

                <div class="flex justify-end text-lg font-semibold text-gray-900 mt-4">
                    <p class="mr-2">Precio:</p>
                    <p>${{ $product->price }}</p>
                </div>

                {{-- Livewire: según el tipo de producto --}}
                @if ($product->subcategory->size)
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif ($product->subcategory->color)
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif

             
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor.create(document.querySelector('#editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Párrafo',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Encabezado 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Encabezado 2',
                            class: 'ck-heading_heading2'
                        }
                    ]
                }
            }).catch(error => console.log(error));
        </script>
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
