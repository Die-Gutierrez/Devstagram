<div>
    <section class="relative">
        <div class="relative flex">
            <input
                autocomplete="off"
                type="text"
                wire:model.live.debounce.150ms="busqueda"
                class="relative m-0 block flex-auto rounded border border-solid border-neutral-200 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out placeholder:text-neutral-500 focus:z-[3] focus:border-primary focus:shadow-inset focus:outline-none motion-reduce:transition-none dark:border-white/10 dark:text-white dark:placeholder:text-neutral-200 dark:autofill:shadow-autofill dark:focus:border-primary"
                placeholder="Buscar"
                aria-label="Search"
                id="buscarInput"
                aria-describedby="button-addon2"/>
            <span
                class="flex items-center whitespace-nowrap px-3 py-[0.25rem] text-surface dark:border-neutral-400 dark:text-white [&>svg]:h-5 [&>svg]:w-5"
                id="button-addon2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor">
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                </svg>
              </span>
        </div>
        @if($busquedaEstaClickeada && count($usuarios))
            <div class="absolute w-full">
                <ul class="shadow-md mt-2 ms-3   bg-white relative "
                    id="listaUsuarios">
                    @foreach($usuarios as $usuario)
                        <li>
                            <a href="{{ route('publicaciones.index', $usuario) }}"
                               class="p-3 flex gap-x-3 cursor-pointer hover:bg-gray-50 ">
                                <img
                                    src="{{ ($usuario->imagen) ? asset("perfiles/$usuario->imagen"): asset('img/usuario.svg' )}}"
                                    width="20" class="rounded-full" alt="img">
                                <p>{{ $usuario->nombre }}</p>
                            </a>
                        </li>
                    @endforeach
                    <button wire:click="ocultarListaBusqueda" class="w-8 h-8 bg-black flex p-2 items-center
                    justify-center rounded-full absolute text-white -right-3 font-semibold font-sans
                        -bottom-3 text-center">
                        X
                    </button>
                </ul>
            </div>
        @endif
    </section>
</div>

