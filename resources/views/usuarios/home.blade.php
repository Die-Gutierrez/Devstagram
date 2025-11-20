@extends('layouts.app')

@section('titulo')
    Tendencias
@endsection

@section('contenido')
    <x-listar-post :publicaciones="$publicaciones"/>
@endsection
