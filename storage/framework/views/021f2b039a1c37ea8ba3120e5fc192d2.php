<div>
    <div class="my-5 space-y-5">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $respuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $respuesta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="ps-14 text-base bg-white rounded-lg space-y-3">
                <header class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <a href="<?php echo e(route('publicaciones.index', $respuesta->usuario)); ?>"
                           class="inline-flex items-center mr-3 text-sm text-gray-900 ">
                            <img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="<?php echo e(($respuesta->usuario->imagen) ? asset("perfiles/{$respuesta->usuario->imagen}"): asset('img/usuario.svg' )); ?>"
                                alt="usuario">
                            <?php echo e($respuesta->usuario->nombre_usuario); ?>

                        </a>
                        <p class="text-sm text-gray-600">
                            <time>
                                <?php echo e($respuesta->created_at->diffForHumans()); ?>

                            </time>
                        </p>
                    </div>
                </header>
                <main class="text-gray-500 ">
                    <?php echo e($respuesta->respuesta); ?>

                </main>
                <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                    <!--[if BLOCK]><![endif]--><?php if($respuesta->usuario->id == auth()->user()->getAuthIdentifier()): ?>
                        <footer class="flex items-center mt-4 space-x-4">
                            <button wire:click="eliminarRespuesta(<?php echo e($respuesta->id); ?>)" type="submit"
                                    wire:loading.attr="disabled"
                                    class="flex items-center gap-x-2 hover:underline ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                     fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 7l16 0"/>
                                    <path d="M10 11l0 6"/>
                                    <path d="M14 11l0 6"/>
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/>
                                </svg>
                                <label class="text-gray-800 text-sm cursor-pointer ">
                                    Eliminar
                                </label>
                            </button>
                        </footer>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH C:\Users\snais\OneDrive\Documentos\PHP Proyectos\netdev\resources\views/livewire/responder-comentario.blade.php ENDPATH**/ ?>