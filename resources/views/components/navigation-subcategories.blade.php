
@props(['category'])
<div class="grid grid-cols-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-gray-900 mb-3">Subcategorias</p>
        <ul>
            @foreach($category->subcategories as $subcategory)
            <li>
                <a href="{{route('categories.show',$category).'?subcategoria='.$subcategory->slug}}" class="text-zinc-500 font-semibold py-1 px-4 hover:text-orange-500">
                    {{$subcategory->name}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="col-span-3">
        <img src="{{Storage::url($category->image)}}"
            class="bg-gray-800 h-64 w-full object-cover object-center rounded-lg" alt="">
    </div>
</div>