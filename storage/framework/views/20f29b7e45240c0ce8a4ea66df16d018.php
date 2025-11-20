<?php $__env->startSection('titulo'); ?>
    <?php echo e($publicacion->titulo); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script type="module">
        document.addEventListener('DOMContentLoaded', () => {
            const eliminar = document.getElementById('eliminar');
            if (eliminar) {
                eliminar.addEventListener('click', (e) => {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Espera!',
                        text: '¿Estás seguro de eliminar esta publicación?',
                        icon: 'error',
                        confirmButtonText: 'Sí',
                        showCancelButton: true,
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            eliminar.parentElement.submit();
                        }
                    });

                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="container flex flex-col items-center md:flex-row md:items-start justify-center gap-10">
        <div class="md:basis-1/2 lg:basis-2/5 p-5 md:p-0">
            <img src="<?php echo e(asset("uploads/$publicacion->imagen")); ?>" alt="post">
            <div class="flex justify-between shadow bg-white px-6 py-4">
                <div class="space-y-1">
                    <div class="flex">
                        <img
                            src="<?php echo e(($publicacion->usuario->imagen) ? asset("perfiles/{$publicacion->usuario->imagen}"): asset('img/usuario.svg' )); ?>"
                            class="mr-2 w-6 h-6 rounded-full" alt="perfil">
                        <p class="font-bold"><?php echo e($publicacion->usuario->nombre_usuario); ?></p>
                    </div>
                    <p class="font-semibold text-lg inline-block hover:text-indigo-600
                                transition duration-500 ease-in-out">
                        <?php echo e($publicacion->titulo); ?>

                    </p>
                    <p class="text-gray-500 text-sm">
                        <?php echo e($publicacion->descripcion); ?>

                    </p>
                    <p class="text-sm text-gray-500">
                        <?php echo e($publicacion->created_at->diffForHumans()); ?>

                    </p>
                </div>
                <div class="flex flex-col items-center justify-between">
                    <?php if(auth()->guard()->check()): ?>
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('like-publicacion', ['publicacion' => $publicacion]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3691020179-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                        <p><?php echo e($publicacion->likes->count()); ?> Likes</p>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if($usuario->id == auth()->user()->getAuthIdentifier()): ?>
                            <form action="<?php echo e(route('publicaciones.destroy', $publicacion)); ?>" method="post">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                                <button id="eliminar" class="bg-red-600 text-white px-4 py-2.5 rounded-md"
                                        type="submit">
                                    Eliminar
                                </button>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="w-full md:basis-1/2 lg:basis-3/5">
            <section class="px-5">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Comentarios
                        (<?php echo e($publicacion->comentarios->count()); ?>)</h2>
                </div>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('comentar-publicacion', ['publicacion' => $publicacion,'usuario' => $usuario]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3691020179-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\snais\OneDrive\Documentos\PHP Proyectos\netdev\resources\views/publicaciones/mostrar.blade.php ENDPATH**/ ?>