<div>
    <div class="flex gap-x-2">
        <button class="cursor-pointer"
                wire:click="like"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart"
                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#000000"
                 fill="<?php echo e($isLiked ? 'red' : 'none'); ?>" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/>
            </svg>
        </button>
        <p><?php echo e($likesNumber); ?> likes</p>
    </div>
</div>
<?php /**PATH C:\Users\snais\OneDrive\Documentos\PHP Proyectos\netdev\resources\views/livewire/like-publicacion.blade.php ENDPATH**/ ?>