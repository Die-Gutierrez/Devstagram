@extends("layouts.app")

@section("titulo")
    Únete a NetDev ya !
@endsection

@section("contenido")
    <div class="md:flex md:justify-center md:gap-4 md:items-center">
        <div class="md:w-1/2 p-5">
            <img src="{{asset("img/registrar.JPG")}}" alt="registro_usuario">
        </div>
        <div class="md:w-1/2 bg-white p-6 rounded-lg ">
            <form action="/crear-cuenta" method="post" class="space-y-5" novalidate>
                @csrf
                <h1 class=" zilla-slab-regular text-center text-2xl mb-10 uppercase">Registrate</h1>
                <div class="space-y-2">
                    <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input
                        id="nombre"
                        name="nombre"
                        placeholder="Tu nombre"
                        value="{{old("nombre")}}"
                        class="border p-3 w-full rounded-lg
                            @error("nombre")
                            border-red-500
                            @enderror
                            "
                        type="text">
                    @error("nombre")
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="nombre_usuario" class="mb-2 block uppercase text-gray-500 font-bold">
                        Usuario
                    </label>
                    <input
                        id="nombre_usuario"
                        name="nombre_usuario"
                        placeholder="Tu nombre de usuario"
                        value="{{old("nombre_usuario")}}"
                        class="border p-3 w-full rounded-lg
                            @error("nombre_usuario")
                            border-red-500
                            @enderror
                            "
                        type="text">
                    @error("nombre_usuario")
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="correo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Correo
                    </label>
                    <input
                        id="correo"
                        name="correo"
                        placeholder="Tu correo electronico"
                        value="{{old("correo")}}"

                        class="border p-3 w-full rounded-lg
                        @error("correo")
                            border-red-500
                        @enderror
                        "
                        type="email">
                    @error("correo")
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="flex gap-x-3">
                    <div class="space-y-2 basis-1/2">
                        <label for="clave" class="mb-2 block uppercase text-gray-500 font-bold">
                            Clave
                        </label>
                        <input
                            id="clave"
                            name="clave"
                            placeholder="Tu clave"
                            class="border p-3 w-full rounded-lg
                        @error("clave")
                            border-red-500
                            @enderror
                        "
                            type="password">
                        @error("clave")
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="space-y-2 basis-1/2">
                        <label for="clave_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                            Repetir clave
                        </label>
                        <input
                            id="clave_confirmation"
                            name="clave_confirmation"
                            placeholder="Repite tu clave"
                            class="border p-3 w-full rounded-lg
                        @error("clave_confirmation")
                            border-red-500
                        @enderror
                        "
                            type="password">
                    </div>
                </div>

                <input value="Crear cuenta"
                       class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                       uppercase font-bold w-full p-3 text-white rounded-lg"
                       type="submit">
            </form>
        </div>
    </div>
@endsection

