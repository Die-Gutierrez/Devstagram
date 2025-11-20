<?php $__env->startSection("titulo"); ?>
    Perfil: <?php echo e($usuario->nombre); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection("contenido"); ?>
    <div class="flex flex-col items-center gap-y-10">
        <div class="flex basis-1/2 flex-col items-center md:flex-row gap-5 justify-center">
            <div class="rounded-full overflow-hidden">
                <img src="<?php echo e(($usuario->imagen) ? asset("perfiles/$usuario->imagen"): asset('img/usuario.svg' )); ?>"
                     alt="imagen_usuario" width="300">
            </div>
            <div class="basis-1/2 flex flex-col md:justify-center items-center md:py-10 md:items-start">
                <p class="text-gray-700 text-2xl mb-3 flex items-center gap-x-3">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if($usuario->id == auth()->user()->getAuthIdentifier()): ?>
                            <a href="<?php echo e(route('perfiles.index', $usuario)); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                     width="24"
                                     height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/>
                                    <path d="M20.85 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/>
                                    <path d="M16 5l3 3"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php echo e($usuario->nombre); ?>

                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    <?php echo e($usuario->seguidores->count()); ?>

                    <span class="font-normal"> <?php echo app('translator')->choice('seguidor|seguidores',$usuario->seguidores->count()  ); ?></span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    <?php echo e($usuario->publicaciones->count()); ?>

                    <span class="font-normal">posts</span>
                </p>
                <p class="text-gray-800 text-sm font-bold">
                    <?php echo e($usuario->seguimientos->count()); ?>

                    <span class="font-normal">siguiendo</span>
                </p>
                <?php if(auth()->guard()->check()): ?>
                    <?php if($usuario->id == auth()->user()->getAuthIdentifier()): ?>
                        <form action="<?php echo e(route('perfiles.update', $usuario)); ?>" class="mt-8" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="flex items-center gap-x-2 hover:underline  ">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon icon-tabler icon-tabler-trash-filled"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path
                                        d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z"
                                        stroke-width="0" fill="currentColor"/>
                                    <path
                                        d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z"
                                        stroke-width="0" fill="currentColor"/>
                                </svg>
                                <label class="text-gray-800 text-sm cursor-pointer ">
                                    Eliminar Foto
                                </label>
                            </button>

                        </form>
                    <?php else: ?>
                        <?php if($usuario->revisarSeguidor(auth()->user())): ?>
                            <form action="<?php echo e(route('usuarios.seguidores.destroy', $usuario)); ?>" method="POST"
                                  class="mt-3">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <input type="submit"
                                       class="bg-red-700 text-white uppercase rounded-lg px-3 py-1
                        text-xs font-bold cursor-pointer hover:bg-red-500" value="dejar de seguir"
                                >
                            </form>
                        <?php else: ?>
                            <form action="<?php echo e(route('usuarios.seguidores.store', $usuario)); ?>" method="POST"
                                  class="mt-3">
                                <?php echo csrf_field(); ?>
                                <input type="submit"
                                       class="bg-blue-700 text-white uppercase rounded-lg px-3 py-1
                        text-xs font-bold cursor-pointer hover:bg-blue-500" value="seguir"
                                >
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <main class="space-y-5 ">
            <?php if($usuario->publicaciones->count() > 0): ?>
                <h1 class="text-center font-black text-3xl font-sans">Publicaciones</h1>
                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 p-5 gap-3">
                    <?php $__currentLoopData = $usuario->publicaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded overflow-hidden shadow-lg">

                            <a href="#"></a>
                            <div class="relative">
                                <a href="<?php echo e(route('publicaciones.show', ['usuario' => $usuario, 'publicacion' => $publicacion])); ?>">
                                    <img src="<?php echo e(asset("uploads/$publicacion->imagen")); ?>" alt="publicacion"
                                         width="300">
                                    <div class="hover:bg-transparent transition duration-300 absolute
                                bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <?php if(auth()->guard()->check()): ?>
                    <?php if($usuario->id == auth()->user()->getAuthIdentifier()): ?>
                        <h2 class="font-black text-center text-3xl ">Empieza creando tu primer post</h2>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(!auth()->user() || auth()->user()->getAuthIdentifier() != $usuario->id): ?>
                    <h2 class="font-black text-center text-3xl ">No hay publicaciones</h2>
                <?php endif; ?>
            <?php endif; ?>
        </main>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\snaisdev\Documents\netdev-master\resources\views/usuarios/ver-perfil.blade.php ENDPATH**/ ?>