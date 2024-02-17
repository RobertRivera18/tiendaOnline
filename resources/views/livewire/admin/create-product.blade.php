<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-xl text-center font-semibold mb-8">Complete esta informacion para crear un producto</h1>
    <div class="grid grid-cols-2 gap-6 mb-4">

        <div>
            <x-label value="Categorías" />
            <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                wire:model="category_id">
                <option value="" selected disabled>Seleccione una categoría</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <x-input-error for="category_id" />
        </div>


        {{-- Subcategoría --}}
        <div>
            <x-label value="Subcategorías" />
            <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                wire:model="subcategory_id">
                <option value="" selected disabled>Seleccione una subcategoría</option>

                @foreach ($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach
            </select>

            <x-input-error for="subcategory_id" />
        </div>


    </div>

    <div class="mb-4">
        <x-label value="Nombre" />
        <x-input type="text" class="w-full" wire:model="name" placeholder="Ingrese nombre del Producto" />
        <x-input-error for="name" />
    </div>

    <div class="mb-4">
        <x-label value="Slug" />
        <x-input type="text" wire:model="slug" class="w-full bg-gray-200" placeholder="Ingrese del Slug del Producto" />
        <x-input-error for="slug" />
    </div>

    {{---Descripcion--}}
    <div class="mb-4">
        <div wire:ignore>
            <x-label value="Descripcion" />
            <textarea class="w-full form-control" rows="4" wire:model="description" x-data x-init="ClassicEditor.create($refs.miEditor)
        .then(function(editor){
            editor.model.document.on('change:data', () => {
                @this.set('description', editor.getData())
            })
        })
        .catch( error => {
            console.error( error );
        } );" x-ref="miEditor">
    </textarea>
        </div>
        <x-input-error for="description" />
        
    </div>


    <div class="mb-4 grid grid-cols-2 gap-6">
        <div>
            {{---Marca---}}
            <x-label value="Marca" />
            <select class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                wire:model="brand_id">
                <option value="" selected disabled>Seleccione una Marca</option>
                @foreach($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
            <x-input-error for="brand_id" />
        </div>

        <div>
            <x-label value="Precio" />
            <x-input type="number" class="w-full" step=".01" wire:model="price" />
            <x-input-error for="price" />
        </div>
    </div>

    @if ($subcategory_id)

    @if (!$this->subcategory->color && !$this->subcategory->size)
    <div>
        <x-label value="Cantidad" />
        <x-input type="number" class="w-full" wire:model="quantity" />
        <x-input-error for="quantity" />
    </div>
    @endif
    @endif

    <div class="flex mt-4">
      <x-button 
              class="ml-auto" 
              wire:target="save"
              wire:loading.attr="disabled"
              wire:click="save">
              Crear Producto
      </x-button>
    </div>
</div>