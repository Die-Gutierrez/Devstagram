<div>
    @if($publicaciones->count())
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 p-5 gap-3">
            @foreach($publicaciones as $publicacion)
                <div class="rounded overflow-hidden shadow-lg">
                    <a href="#"></a>
                    <div class="relative">
                        <a href="{{ route('publicaciones.show', ['usuario' => $publicacion->usuario, 'publicacion' => $publicacion]) }}">
                            <img src="{{ asset("uploads/$publicacion->imagen") }}" alt="publicacion">
                            <div class="hover:bg-transparent transition duration-300 absolute
                                    bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                            </div>
                        </a>
                    </div>
                    <div class="p-3 flex justify-between">
                        <div class="flex">
                            <img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="{{ ($publicacion->usuario->imagen) ? asset("perfiles/{$publicacion->usuario->imagen}"): asset('img/usuario.svg' )}}"
                                alt="usuario">
                            <p>{{ $publicacion->usuario->nombre_usuario }}</p>
                        </div>
                        <time>{{ $publicacion->created_at->diffForHumans() }}</time>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h2 class="text-center text-3xl ">Tus amigos aún no han publicado nada</h2>
    @endif
</div>
