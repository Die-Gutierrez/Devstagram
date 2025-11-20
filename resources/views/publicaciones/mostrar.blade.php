@extends('layouts.app')

@section('titulo')
    {{ $publicacion->titulo }}
@endsection


@push('scripts')
    <script type="module">
        document.addEventListener('DOMContentLoaded', () => {
            const eliminar = document.getElementById('eliminar');
            if (eliminar) {
                eliminar.addEventListener('click', (e) => {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Espera!',
                        text: '¿Estás seguro de eliminar esta publicación?',
                        icon: 'error',
                        confirmButtonText: 'Sí',
                        showCancelButton: true,
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            eliminar.parentElement.submit();
                        }
                    });

                });
            }
        });
    </script>
@endpush

@section('contenido')
    <div class="container flex flex-col items-center md:flex-row md:items-start justify-center gap-10">
        <div class="md:basis-1/2 lg:basis-2/5 p-5 md:p-0">
            <img src="{{ asset("uploads/$publicacion->imagen") }}" alt="post">
            <div class="flex justify-between shadow bg-white px-6 py-4">
                <div class="space-y-1">
                    <div class="flex">
                        <img
                            src="{{ ($publicacion->usuario->imagen) ? asset("perfiles/{$publicacion->usuario->imagen}"): asset('img/usuario.svg' )}}"
                            class="mr-2 w-6 h-6 rounded-full" alt="perfil">
                        <p class="font-bold">{{ $publicacion->usuario->nombre_usuario }}</p>
                    </div>
                    <p class="font-semibold text-lg inline-block hover:text-indigo-600
                                transition duration-500 ease-in-out">
                        {{ $publicacion->titulo }}
                    </p>
                    <p class="text-gray-500 text-sm">
                        {{ $publicacion->descripcion }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $publicacion->created_at->diffForHumans() }}
                    </p>
                </div>
                <div class="flex flex-col items-center justify-between">
                    @auth()
                        <livewire:like-publicacion :publicacion="$publicacion"/>
                    @endauth
                    @guest()
                        <p>{{ $publicacion->likes->count()  }} Likes</p>
                    @endguest
                    @auth()
                        @if($usuario->id == auth()->user()->getAuthIdentifier())
                            <form action="{{ route('publicaciones.destroy', $publicacion) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button id="eliminar" class="bg-red-600 text-white px-4 py-2.5 rounded-md"
                                        type="submit">
                                    Eliminar
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        <div class="w-full md:basis-1/2 lg:basis-3/5">
            <section class="px-5">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Comentarios
                        ({{ $publicacion->comentarios->count() }})</h2>
                </div>
                <livewire:comentar-publicacion :publicacion="$publicacion" :usuario="$usuario"/>
            </section>
        </div>
    </div>
@endsection
