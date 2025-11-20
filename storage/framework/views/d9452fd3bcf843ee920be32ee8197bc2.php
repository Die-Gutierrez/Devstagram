<div>
    <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
        <form class="mb-6" wire:submit="comentar">
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                <label for="comentario" class="sr-only">Your comment</label>
                <textarea id="comentario" rows="4" name="comentario" wire:model="comentarioInput"
                          class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none
                                      "
                          placeholder="Escribe un comentario..."></textarea>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["comentario"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="bg-red-500 text-white w-full my-2 rounded-lg text-sm py-2 px-3  text-center">
                    <?php echo e($message); ?>

                </p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center
            text-white bg-indigo-700 rounded-lg focus:ring-4 focus:ring-primary-200
                                hover:bg-primary-800">
                Publicar comentario
            </button>
        </form>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <div class="h-96 overflow-y-scroll space-y-6 bg-white p-6 rounded-lg" id="scroll">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indice => $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class=" text-base rounded-lg space-y">
                <header class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <a href="<?php echo e(route('publicaciones.index', $comentario->usuario)); ?>"
                           class="inline-flex items-center mr-3 text-sm text-gray-900 ">
                            <img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="<?php echo e(($comentario->usuario->imagen) ? asset("perfiles/{$comentario->usuario->imagen}"): asset('img/usuario.svg' )); ?>"
                                alt="usuario">
                            <?php echo e($comentario->usuario->nombre_usuario); ?>

                        </a>
                        <p class="text-sm text-gray-600">
                            <time>
                                <?php echo e($comentario->created_at->diffForHumans()); ?>

                            </time>
                        </p>
                    </div>
                </header>
                <main class="text-gray-500 ">
                    <?php echo e($comentario->comentario); ?>

                </main>
                <footer class="flex items-center mt-4 space-x-4">
                    <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
                        <!--[if BLOCK]><![endif]--><?php if($comentario->usuario->id == auth()->user()->getAuthIdentifier()): ?>
                            <button wire:click="eliminarComentario(<?php echo e($comentario->id); ?>)" type="submit"
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
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <button type="button" wire:click="responder(<?php echo e($comentario->id); ?>)"
                                class="flex items-center text-sm text-gray-800 hover:underline ">
                                <span class="mr-2">
                                    <img src="<?php echo e(asset('svg/responder.svg')); ?>" alt="responder" class="w-5">
                                </span>
                            Responder
                        </button>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </footer>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('responder-comentario', ['idComentario' => $comentario->id]);

$__html = app('livewire')->mount($__name, $__params, $comentario->id, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <!--[if BLOCK]><![endif]--><?php if($idComentarioSeleccionado == $comentario->id): ?>
                    <form wire:submit="publicarRespuesta(<?php echo e($comentario->id); ?>)" class="ms-5">
                        <div class="py-2 px-4 mb-4 bg-gray-100 rounded-lg rounded-t-lg border border-gray-200 ">
                            <input wire:model="respuestaInput" type="text"
                                   class="px-0 w-full bg-transparent text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none
                                      "
                                   placeholder="Respondiendo a <?php echo e($comentario->usuario->nombre_usuario); ?>"/>
                        </div>
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["respuestaInput"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="bg-red-500 text-white w-full my-2 rounded-lg text-sm py-2 px-3  text-center">
                            <?php echo e($message); ?>

                        </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </form>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-gray-700 ">No hay comentarios aún</p>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>



<?php /**PATH C:\Users\snais\OneDrive\Documentos\PHP Proyectos\netdev\resources\views/livewire/comentar-publicacion.blade.php ENDPATH**/ ?>