@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
@endpush

@section('titulo')
    Crear una nueva Publicación
@endsection

@section('contenido')
    <div class="md:flex p-10 bg-white md:w-4/5 mx-auto rounded-lg shadow-xl mt-10 md:mt-0 gap-5">
        <div class="basis-1/2">
            <form action="{{ route('imagenes.store') }}" class="dropzone h-96 rounded flex flex-col justify-center
        items-center" id="dropzone" method="post" enctype="multipart/form-data">
                @csrf
            </form>
            @error("imagen")
            <p class="bg-red-500 text-white w-full my-2 rounded-lg text-sm py-2 px-3  text-center">
                {{ $message }}
            </p>
            @enderror
        </div>
        <form action="{{ route('publicaciones.store') }}" method="post" class="space-y-3 basis-1/2" id="post" novalidate
              enctype="multipart/form-data">
            @csrf
            <div class="space-y-3">
                <div class="md:flex items-start gap-3 flex-col">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input
                        id="titulo"
                        name="titulo"
                        placeholder="Titulo de la publicación"
                        value="{{old("titulo")}}"
                        class="border p-3 w-full rounded-lg
                            @error("nombre")
                            border-red-500
                            @enderror
                            "
                        type="text">
                    @error("titulo")
                    <p class="bg-red-500 text-white w-full my-2 rounded-lg text-sm py-2 px-3 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="md:flex items-start gap-3 flex-col">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripción de la publicación"
                        value="{{old("descripcion")}}"
                        class="border p-3 w-full rounded-lg
                            @error("nombre")
                            border-red-500
                            @enderror
                            "
                        type="text"></textarea>
                    @error("descripcion")
                    <p class="bg-red-500 text-white w-full my-2 rounded-lg text-sm py-2 px-3  text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                <input value="Crear publicación"
                       class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                       uppercase font-bold w-full p-3 text-white rounded-lg"
                       type="submit">
            </div>
        </form>
    </div>
@endsection
