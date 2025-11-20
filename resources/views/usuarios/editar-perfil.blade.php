@extends("layouts.app")


@section("titulo")
    Perfil: {{ $usuario->nombre }}
@endsection


@section('contenido')
    <form class="max-w-sm mx-auto" method="post" action="{{ route('perfiles.store', $usuario) }}"
          enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
            <input value="{{ $usuario->nombre }}" type="text" id="nombre" name="nombre" class="shadow-sm bg-gray-50 border border-gray-300
            text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
        </div>
        @error("nombre")
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
            {{ $message }}
        </p>
        @enderror
        <div class="mb-5">
            <label for="nombre_usuario" class="block mb-2 text-sm font-medium text-gray-900">Nombre de Usuario</label>
            <input value="{{ $usuario->nombre_usuario }}" type="text" id="nombre_usuario" name="nombre_usuario" class="shadow-sm bg-gray-50 border border-gray-300
            text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"/>
        </div>
        @error("nombre_usuario")
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
            {{ $message }}
        </p>
        @enderror
        <div class="mb-10">
            <label class="block mb-2 text-sm font-medium text-gray-900" for="imagen">Foto</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50
             focus:outline-none " id="imagen" name="imagen" aria-describedby="user_avatar_help"
                   accept=".png, .jpeg,.jpg" type="file">
        </div>
        @error("imagen")
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
            {{ $message }}
        </p>
        @enderror
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full ">Actualizar
        </button>
    </form>

@endsection
