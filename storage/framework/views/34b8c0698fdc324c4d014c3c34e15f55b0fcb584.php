<div wire:init="loadPosts">
    <?php if(count($products)): ?>

    <div class="glider-contain">
        <ul class="glider-<?php echo e($category->id); ?>">

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="bg-white rounded-lg shadow-md <?php echo e($loop->last ? '' : 'sm:mr-4'); ?>">
                <article>
                    <figure>
                        <a href="<?php echo e(route('products.show',$product)); ?>">
                            <img class=" rounded-lg w-full object-cover object-center"
                                src="<?php echo e(Storage::url($product->images->first()->url)); ?>" alt="">
                        </a>
                    </figure>

                    <div class="py-4 px-6">
                        <h1 class="text-md font-semibold">
                            <a href="<?php echo e(route('products.show',$product)); ?>">
                                <?php echo e(Str::limit($product->name, 30)); ?>

                            </a>
                        </h1>

                        <p class="text-trueGray-700">US $<?php echo e($product->price); ?></p>
                    </div>
                </article>
            </li>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>

        <button aria-label="Previous" class="glider-prev">«</button>
        <button aria-label="Next" class="glider-next">»</button>
        <div role="tablist" class="dots"></div>
    </div>

    <?php else: ?>

    <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
        <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
    </div>

    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\tienda1\resources\views/livewire/category-products.blade.php ENDPATH**/ ?>