<div>
    <div class="my-5 space-y-5">
        @foreach($respuestas as $respuesta)
            <article class="ps-14 text-base bg-white rounded-lg space-y-3">
                <header class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <a href="{{ route('publicaciones.index', $respuesta->usuario) }}"
                           class="inline-flex items-center mr-3 text-sm text-gray-900 ">
                            <img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="{{ ($respuesta->usuario->imagen) ? asset("perfiles/{$respuesta->usuario->imagen}"): asset('img/usuario.svg' )}}"
                                alt="usuario">
                            {{ $respuesta->usuario->nombre_usuario}}
                        </a>
                        <p class="text-sm text-gray-600">
                            <time>
                                {{ $respuesta->created_at->diffForHumans() }}
                            </time>
                        </p>
                    </div>
                </header>
                <main class="text-gray-500 ">
                    {{ $respuesta->respuesta }}
                </main>
                @auth()
                    @if($respuesta->usuario->id == auth()->user()->getAuthIdentifier())
                        <footer class="flex items-center mt-4 space-x-4">
                            <button wire:click="eliminarRespuesta({{$respuesta->id}})" type="submit"
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
                    @endif
                @endauth
            </article>
        @endforeach
    </div>
</div>
