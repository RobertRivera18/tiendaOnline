<div>
    <a href="<?php echo e(route('shopping-cart')); ?>"
        class="py-2 px-4 text-sm flex items-center text-gray-500 hover:bg-orange-500 hover:text-white">
        <span class="flex justify-center w-9">
            <i class="fas fa-shopping-cart"></i>
        </span>
        <span class="relative inline-block pr-4">
            Carrito de compras
            <?php if(Cart::count()): ?>
                <span
                    class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"><?php echo e(Cart::count()); ?></span>
            <?php else: ?>
                <span
                    class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
            <?php endif; ?>
        </span>
    </a>
</div>
<?php /**PATH C:\xampp\htdocs\tienda1\resources\views/livewire/cart-mobil.blade.php ENDPATH**/ ?>