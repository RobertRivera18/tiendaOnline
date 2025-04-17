<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => ['class' => 'px-4 my-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'px-4 my-4']); ?>
        
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
                        <a href="<?php echo e(route('categories.show', $product->subcategory->category->slug)); ?>"
                            class="hover:text-blue-600 dark:hover:text-white">
                            <?php echo e($product->subcategory->category->name); ?>

                        </a>
                    </div>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="text-gray-500 dark:text-gray-400">
                            <?php echo e($product->subcategory->name); ?>

                        </span>
                    </div>
                </li>
            </ol>
        </nav>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-thumb="<?php echo e(Storage::url($image->url)); ?>">
                                <img class="rounded-lg" src="<?php echo e(Storage::url($image->url)); ?>" alt="Imagen del producto">
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('review', $product)): ?>
                    <div class="text-gray-700 mt-6">
                        <h2 class="font-bold text-lg mb-2">Dejar una reseña</h2>
                        <form action="<?php echo e(route('reviews.store', $product)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <textarea name="comment" id="editor" class="w-full mb-2"></textarea>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['for' => 'comment']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'comment']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

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
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'ml-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-auto']); ?>Agregar Reseña <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>

                <?php if($product->reviews->isNotEmpty()): ?>
                    <div class="mt-6">
                        <h2 class="font-bold text-lg text-gray-700 mb-2">Reseñas</h2>
                        <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-start mb-4">
                                <img class="w-10 h-10 rounded-full object-cover mr-4"
                                    src="<?php echo e($review->user->profile_photo_url); ?>" alt="<?php echo e($review->user->name); ?>">
                                <div class="flex-1">
                                    <p class="font-semibold"><?php echo e($review->user->name); ?></p>
                                    <p class="text-xs text-gray-500"><?php echo e($review->created_at->diffForHumans()); ?></p>
                                    <div class="mt-1"><?php echo $review->comment; ?></div>
                                </div>
                                <div class="ml-2 text-yellow-500">
                                    <?php echo e($review->rating); ?> <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <hr class="border-gray-300">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            
            <div>
                <span
                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                    <?php echo e($product->subcategory->name); ?>

                </span>

                <h1 class="text-2xl font-bold text-gray-800 mt-2"><?php echo e($product->name); ?></h1>

                <div class="flex justify-between items-center my-3">
                    <p class="text-zinc-700">
                        <span class="font-bold">Marca:</span>
                        <a href="#"
                            class="underline ml-1 hover:text-orange-500 capitalize"><?php echo e($product->brand->name); ?></a>
                    </p>

                    <?php
                        $averageRating = $product->reviews->avg('rating') ?? 5;
                    ?>

                    <div class="flex items-center space-x-1 text-sm text-yellow-500">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <i class="fas fa-star <?php echo e($averageRating >= $i ? '' : 'text-gray-300'); ?>"></i>
                        <?php endfor; ?>
                        <span class="ml-1 text-orange-500">(<?php echo e($product->reviews->count()); ?> reseñas)</span>
                    </div>
                </div>

                <span
                    class="inline-block text-sm font-semibold px-3 py-1 rounded bg-green-100 text-green-600 dark:bg-slate-700">
                    <?php echo e($product->status == 2 ? 'Activo' : ($product->status == 1 ? 'Inactivo' : 'Desconocido')); ?>

                </span>

                <div class="mt-4 text-gray-800 prose max-w-none">
                    <?php echo $product->description; ?>

                </div>

                <div class="flex justify-end text-lg font-semibold text-gray-900 mt-4">
                    <p class="mr-2">Precio:</p>
                    <p>$<?php echo e($product->price); ?></p>
                </div>

                
                <?php if($product->subcategory->size): ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-cart-item-size', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('iTrPDcu')) {
    $componentId = $_instance->getRenderedChildComponentId('iTrPDcu');
    $componentTag = $_instance->getRenderedChildComponentTagName('iTrPDcu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('iTrPDcu');
} else {
    $response = \Livewire\Livewire::mount('add-cart-item-size', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('iTrPDcu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php elseif($product->subcategory->color): ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-cart-item-color', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('1ZD7Rtz')) {
    $componentId = $_instance->getRenderedChildComponentId('1ZD7Rtz');
    $componentTag = $_instance->getRenderedChildComponentTagName('1ZD7Rtz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1ZD7Rtz');
} else {
    $response = \Livewire\Livewire::mount('add-cart-item-color', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('1ZD7Rtz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php else: ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('add-cart-item', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('mEYIaMm')) {
    $componentId = $_instance->getRenderedChildComponentId('mEYIaMm');
    $componentTag = $_instance->getRenderedChildComponentTagName('mEYIaMm');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('mEYIaMm');
} else {
    $response = \Livewire\Livewire::mount('add-cart-item', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('mEYIaMm', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endif; ?>

             
            </div>
        </div>
    </div>

    <?php $__env->startPush('script'); ?>
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
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\tienda1\resources\views/products/show.blade.php ENDPATH**/ ?>