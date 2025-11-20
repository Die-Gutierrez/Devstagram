<div>
    <?php if($publicaciones->count()): ?>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 p-5 gap-3">
            <?php $__currentLoopData = $publicaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="rounded overflow-hidden shadow-lg">
                    <a href="#"></a>
                    <div class="relative">
                        <a href="<?php echo e(route('publicaciones.show', ['usuario' => $publicacion->usuario, 'publicacion' => $publicacion])); ?>">
                            <img src="<?php echo e(asset("uploads/$publicacion->imagen")); ?>" alt="publicacion">
                            <div class="hover:bg-transparent transition duration-300 absolute
                                    bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                            </div>
                        </a>
                    </div>
                    <div class="p-3 flex justify-between">
                        <div class="flex">
                            <img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="<?php echo e(($publicacion->usuario->imagen) ? asset("perfiles/{$publicacion->usuario->imagen}"): asset('img/usuario.svg' )); ?>"
                                alt="usuario">
                            <p><?php echo e($publicacion->usuario->nombre_usuario); ?></p>
                        </div>
                        <time><?php echo e($publicacion->created_at->diffForHumans()); ?></time>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <h2 class="text-center text-3xl ">Tus amigos aún no han publicado nada</h2>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\snaisdev\Documents\netdev-master\resources\views/components/listar-post.blade.php ENDPATH**/ ?>