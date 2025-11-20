<?php $__env->startSection("titulo"); ?>
    Únete a NetDev ya !
<?php $__env->stopSection(); ?>

<?php $__env->startSection("contenido"); ?>
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-1/2 p-5">
            <img src="<?php echo e(asset("img/registrar.JPG")); ?>" alt="registro_usuario">
        </div>
        <div class="md:w-1/2 bg-white p-6 rounded-lg ">
            <form action="/crear-cuenta" method="post" class="space-y-5" novalidate>
                <?php echo csrf_field(); ?>
                <h1 class=" zilla-slab-regular text-center text-2xl mb-10 uppercase">Registrate</h1>
                <div class="space-y-2">
                    <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input
                        id="nombre"
                        name="nombre"
                        placeholder="Tu nombre"
                        value="<?php echo e(old("nombre")); ?>"
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
                    <?php $__errorArgs = ["nombre"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        <?php echo e($message); ?>

                    </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="space-y-2">
                    <label for="nombre_usuario" class="mb-2 block uppercase text-gray-500 font-bold">
                        Usuario
                    </label>
                    <input
                        id="nombre_usuario"
                        name="nombre_usuario"
                        placeholder="Tu nombre de usuario"
                        value="<?php echo e(old("nombre_usuario")); ?>"
                        class="border p-3 w-full rounded-lg
                            <?php $__errorArgs = ["nombre_usuario"];
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
                    <?php $__errorArgs = ["nombre_usuario"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        <?php echo e($message); ?>

                    </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="space-y-2">
                    <label for="correo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Correo
                    </label>
                    <input
                        id="correo"
                        name="correo"
                        placeholder="Tu correo electronico"
                        value="<?php echo e(old("correo")); ?>"

                        class="border p-3 w-full rounded-lg
                        <?php $__errorArgs = ["correo"];
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
                        type="email">
                    <?php $__errorArgs = ["correo"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        <?php echo e($message); ?>

                    </p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="flex gap-x-3">
                    <div class="space-y-2 basis-1/2">
                        <label for="clave" class="mb-2 block uppercase text-gray-500 font-bold">
                            Clave
                        </label>
                        <input
                            id="clave"
                            name="clave"
                            placeholder="Tu clave"
                            class="border p-3 w-full rounded-lg
                        <?php $__errorArgs = ["clave"];
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
                            type="password">
                        <?php $__errorArgs = ["clave"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            <?php echo e($message); ?>

                        </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="space-y-2 basis-1/2">
                        <label for="clave_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                            Repetir clave
                        </label>
                        <input
                            id="clave_confirmation"
                            name="clave_confirmation"
                            placeholder="Repite tu clave"
                            class="border p-3 w-full rounded-lg
                        <?php $__errorArgs = ["clave_confirmation"];
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
                            type="password">
                    </div>
                </div>

                <input value="Crear cuenta"
                       class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                       uppercase font-bold w-full p-3 text-white rounded-lg"
                       type="submit">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.app", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\snaisdev\Documents\netdev-master\resources\views/auth/registrar.blade.php ENDPATH**/ ?>