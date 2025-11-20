<?php use Illuminate\Support\Facades\Route; ?>
    <!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset('img/icono.png')); ?>" type="image/x-icon"/>
    <title><?php echo $__env->yieldContent("titulo"); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


</head>
<body class="flex flex-col  min-h-screen <?php echo e(auth()->user() ? 'bg-gray-50' : 'bg-white'); ?>">
<header class="p-5 border-b  shadow bg-white">
    <div class="container mx-auto flex flex-col md:flex-row items-center gap-5 justify-between">
        <div class="flex flex-col md:flex-row gap-10 items-center">
            <a href="<?php echo e(auth()->user() ? route('home') : route('index')); ?>"
               class="text-3xl font-black flex items-center gap-x-2">
                NetDev
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-affiliate" width="44"
                     height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                     stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275"/>
                    <path d="M11.683 12.317l5.759 -5.759"/>
                    <path d="M5.5 5.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"/>
                    <path d="M18.5 5.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"/>
                    <path d="M18.5 18.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0"/>
                    <path d="M8.5 15.5m-4.5 0a4.5 4.5 0 1 0 9 0a4.5 4.5 0 1 0 -9 0"/>
                </svg>
            </a>
            <?php if(auth()->guard()->check()): ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('buscar-usuarios', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1376098276-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php endif; ?>
        </div>
        <?php if(auth()->guard()->check()): ?>

            <nav class="flex flex-col md:flex-row gap-5 py-5 lg:py-0 items-center">
                <a href="<?php echo e(route('publicaciones.create')); ?>" class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded
                        text-sm uppercase font-bold cursor-pointer">
                    Crear post
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"/>
                    </svg>

                </a>
                <a href="<?php echo e(route('publicaciones.index', auth()->user()->nombre_usuario)); ?>"
                   class="font-bold text-gray-600 text-sm cursor-pointer">
                    Hola,
                    <span class="font-normal">
                                <?php echo e(auth()->user()->nombre_usuario); ?>

                        </span>
                </a>
                <form action="<?php echo e(route('logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="font-bold uppercase text-gray-600 text-sm flex items-center gap-x-2">
                        Logout
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2" width="24"
                             height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"/>
                            <path d="M15 12h-12l3 -3"/>
                            <path d="M6 15l-3 -3"/>
                        </svg>
                    </button>
                </form>
            </nav>
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
            <?php if(Route::is('index')): ?>
                <nav class="flex gap-3">
                    <?php $__currentLoopData = $redes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $red): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(env('URL_PORTAFOLIO_SNAISDEV') ?? 'https://github.com/snaispro77'); ?>"
                           class="w-10 h-10 flex items-center justify-center rounded-lg bg-white shadow-md shadow-gray-200 group transition-all duration-300">
                            <img src="<?php echo e(asset("img/redes/{$red['logo_url']}")); ?>" alt="red">
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
            <?php else: ?>
                <nav class="flex gap-x-5 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm hover:text-gray-800"
                       href="<?php echo e(route('login.index')); ?>">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm hover:text-gray-800"
                       href="<?php echo e(route('registro.index')); ?>">Crear Cuenta
                    </a>
                </nav>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</header>
<main class="container mx-auto mb-auto mt-10">
    <h2 class="font-black text-center text-3xl mb-10">
        <?php echo $__env->yieldContent("titulo"); ?> <?php if(Route::is('home')): ?>
            😋
        <?php endif; ?>
    </h2>
    <?php echo $__env->yieldContent("contenido"); ?>
</main>
<footer class="mt-10 py-6  font-bold uppercase text-center
        <?php echo e(auth()->user() ? 'text-gray-500': 'text-gray-300 bg-cyan-950'); ?>

    ">
    Devstagram - Todos los derechos reservados por @SnaisDev <?php echo e(now()->year); ?>

</footer>
<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>
</html>
<?php /**PATH C:\Users\snais\OneDrive\Documentos\PHP Proyectos\netdev\resources\views/layouts/app.blade.php ENDPATH**/ ?>