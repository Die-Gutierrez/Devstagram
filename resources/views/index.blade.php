@extends('layouts.app')

@section('titulo')
    Una Gran red de Desarrolladores
@endsection


@section('contenido')
    <div class="flex flex-col-reverse p-5 items-center lg:flex-row lg:justify-center">
        <div class="basis-2/5 lg:basis-3/5">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl
            ">Conectando <br>a tantos como tú</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl ">
                Somos una gran familia, donde puedes compartir tus conocimientos, aprender de los demás y
                vivir tu dia a dia con personas que comparten tus mismos intereses.
            </p>
            <a href="{{ route('registro.index') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3
            text-base font-medium text-center text-white rounded-lg bg-sky-600 hover:bg-sky-700 focus:ring-4
            focus:ring-primary-300">
                Registrate !
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6
                    6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                          clip-rule="evenodd">
                    </path>
                </svg>
            </a>
            <a href="{{ route('login.index') }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium
            text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4
            focus:ring-gray-100">
                Iniciar Sesión
            </a>
        </div>
        <div class="basis-3/5 lg:basis-2/5">
            <img class="w-96 lg:w-full" src="{{ asset('img/home.png') }}" alt="home">
        </div>
    </div>
@endsection
