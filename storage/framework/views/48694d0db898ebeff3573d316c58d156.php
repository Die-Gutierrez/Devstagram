<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('titulo'); ?>
    Crear una nueva Publicación
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="md:flex p-10 bg-white md:w-4/5 mx-auto rounded-lg shadow-xl mt-10 md:mt-0 gap-5">
        <div class="basis-1/2">
            <form action="<?php echo e(route('imagenes.store')); ?>" class="dropzone h-96 rounded flex flex-col justify-center
        items-center" id="dropzone" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
            </form>
            <?php $__errorArgs = ["imagen"];
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
unset($__errorArgs, $__bag); ?>
        </div>
        <form action="<?php echo e(route('publicaciones.store')); ?>" method="post" class="space-y-3 basis-1/2" id="post" novalidate
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="space-y-3">
                <div class="md:flex items-start gap-3 flex-col">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input
                        id="titulo"
                        name="titulo"
                        placeholder="Titulo de la publicación"
                        value="<?php echo e(old("titulo")); ?>"
                        class="border p-3 w-full rounded-lg
                            <?php $__errorArgs = ["nombre"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            border-red-500
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            "
                        type="text">
                    <?php $__errorArgs = ["titulo"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="bg-red-500 text-white w-full my-2 rounded-lg text-sm py-2 px-3 text-center">
                        <?php echo e($message); ?>

                    </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="md:flex items-start gap-3 flex-col">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la publicación"
                        value="<?php echo e(old("descripcion")); ?>"
                        class="border p-3 w-full rounded-lg
                            <?php $__errorArgs = ["nombre"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            border-red-500
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            "
                        type="text"></textarea>
                    <?php $__errorArgs = ["descripcion"];
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
unset($__errorArgs, $__bag); ?>
                </div>
                <input type="hidden" name="imagen" value="<?php echo e(old('imagen')); ?>">
                <input value="Crear publicación"
                       class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                       uppercase font-bold w-full p-3 text-white rounded-lg"
                       type="submit">
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\snais\OneDrive\Documentos\PHP Proyectos\netdev\resources\views/publicaciones/crear.blade.php ENDPATH**/ ?>