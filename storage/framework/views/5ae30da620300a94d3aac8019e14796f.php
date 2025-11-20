<?php $__env->startSection("titulo"); ?>
    Codificando momentos
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection("contenido"); ?>
    <div class="md:flex md:justify-center md:gap-4 md:items-center max-w-6xl mx-auto">
        <div class="md:w-1/2 ">
            <img src="<?php echo e(asset("img/login.jpg")); ?>" alt="login_usuario">
        </div>
        <div class="md:w-6/12  p-6 rounded-lg">
            <form action="<?php echo e(route('login.store')); ?>" method="POST" class="space-y-5" novalidate>
                <?php echo csrf_field(); ?>
                <h1 class="zilla-slab-regular text-center text-2xl mb-10 uppercase">Tus datos</h1>
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
                <div class="space-y-2">
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
                <div>
                    <label for="recordarme" class="flex items-center gap-2 cursor-pointer">
                        <span class="text-gray-500">Recordarme</span>
                        <input
                            id="recordarme"
                            name="recordarme"
                            class="rounded-lg"
                            type="checkbox">
                    </label>
                </div>
                <button
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                       uppercase font-bold w-full p-3 text-white rounded-lg"
                    type="submit">
                    Ingresar
                </button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts.app", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\snaisdev\Documents\netdev-master\resources\views/auth/login.blade.php ENDPATH**/ ?>