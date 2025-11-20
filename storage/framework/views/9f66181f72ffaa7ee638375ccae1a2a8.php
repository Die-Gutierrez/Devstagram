<?php $__env->startSection("titulo"); ?>
    Perfil: <?php echo e($usuario->nombre); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('contenido'); ?>
    <form class="max-w-sm mx-auto" method="post" action="<?php echo e(route('perfiles.store', $usuario)); ?>"
          enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
            <input value="<?php echo e($usuario->nombre); ?>" type="text" id="nombre" name="nombre" class="shadow-sm bg-gray-50 border border-gray-300
            text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
        </div>
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
        <div class="mb-5">
            <label for="nombre_usuario" class="block mb-2 text-sm font-medium text-gray-900">Nombre de Usuario</label>
            <input value="<?php echo e($usuario->nombre_usuario); ?>" type="text" id="nombre_usuario" name="nombre_usuario" class="shadow-sm bg-gray-50 border border-gray-300
            text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
        </div>
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
        <div class="mb-10">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="imagen">Foto</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
             focus:outline-none " id="imagen" name="imagen" aria-describedby="user_avatar_help"
                   accept=".png, .jpeg,.jpg" type="file">
        </div>
        <?php $__errorArgs = ["imagen"];
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
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full ">Actualizar
        </button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\snaisdev\Documents\netdev-master\resources\views/usuarios/editar-perfil.blade.php ENDPATH**/ ?>