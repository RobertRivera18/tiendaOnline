<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    {{--FORMULARIO DE CREACION DE MARCAS--}}
    <x-form-section class=" mb-6" submit="save">
    <x-slot name="title">
        Agregar nueva Marca
    </x-slot>

    <x-slot name="description">
        En esta sección podrá agregar una nueva marca.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label>
                Nombre
            </x-label>

            <x-input type="text" class="w-full" wire:model="createForm.name" />
            <x-input-error for="createForm.name" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-button>
            Agregar
        </x-button>
    </x-slot>
    </x-form-section>


    {{--lISTADO DE MARCAS REGISTRADAS--}}
    <x-action-section>
        <x-slot name="title">
            Lista de Marcas
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las Marcas agregadas
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2">Acción</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-300">
                    @foreach ($brands as $brand)
                    <tr>
                        <td class="py-2">

                            <span class="uppercase underline hover:text-blue-600">
                                {{$brand->name}}
                            </span>
                        </td>
                        <td class="py-2">
                            <div class="flex divide-x divide-gray-300 font-semibold">
                                <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                    wire:click="edit('{{$brand->id}}')">Editar</a>
                                <a class="pl-2 hover:text-red-600 cursor-pointer"
                                    wire:click="$emit('deleteBrand', '{{$brand->id}}')">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </x-slot>
    </x-action-section>

    {{--MODAL EDITAR--}}
    <x-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar Subcategoría
        </x-slot>

        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    <x-label>
                        Nombre
                    </x-label>
                    <x-input wire:model="editForm.name" type="text" class="w-full mt-1" />
                    <x-input-error for="editForm.name" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>

    @push('script')
    <script>
        Livewire.on('deleteBrand', brandId =>{
        Swal.fire({
        title: 'Estás Seguro?',
        text: "El elemento que has seleccionado sera eliminado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
}).then((result) => {
  if (result.isConfirmed) {
    Livewire.emitTo('admin.brands-component','delete',brandId)
    Swal.fire(
      'Eliminado!',
      'El elemento ha sido eliminado.',
      'success'
    )
  }
})
});
    </script>
    @endpush
</div>