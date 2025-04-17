<div wire:init="loadPosts">
    @if (count($products))

    <div class="glider-contain">
        <ul class="glider-{{$category->id}}">

            @foreach ($products as $product)
            <li class="bg-white rounded-lg shadow-md {{ $loop->last ? '' : 'sm:mr-4' }}">
                <article>
                    <figure>
                        <a href="{{route('products.show',$product)}}">
                            <img class=" rounded-lg w-full object-cover object-center"
                                src="{{ Storage::url($product->images->first()->url) }}" alt="">
                        </a>
                    </figure>

                    <div class="py-4 px-6">
                        <h1 class="text-md font-semibold">
                            <a href="{{route('products.show',$product)}}">
                                {{Str::limit($product->name, 30)}}
                            </a>
                        </h1>

                        <p class="text-trueGray-700">US ${{$product->price}}</p>
                    </div>
                </article>
            </li>

            @endforeach

        </ul>

        <button aria-label="Previous" class="glider-prev">«</button>
        <button aria-label="Next" class="glider-next">»</button>
        <div role="tablist" class="dots"></div>
    </div>

    @else

    <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
        <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
    </div>

    @endif
</div>