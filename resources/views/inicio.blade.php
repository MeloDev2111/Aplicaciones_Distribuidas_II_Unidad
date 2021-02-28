@extends('layout')
@section('titulo')
    Inicio
@endsection
@guest
    @extends('infoEquipo')
@else
    @section('contenido')
        <h1>@lang('Bienvenido a Inicio')</h1>
        @auth
        <h3 class="text-primary">{{ auth()->user()->name }}</h3>
        @endauth
    @endsection
@endguest

