@extends('layout')
@section('titulo')
    Inicio
@endsection
@auth
    @section('contenido')
        <div style="width:100%;height: 60%; display: flex; justify-content: center; align-items: center">
            <h1 class="shadow p-3 bg-body rounded text-center"> @lang('Bienvenido')
                <div class="text-primary">{{ auth()->user()->name }}</div></h1>
        </div>
    @endsection
@else
    @extends('infoEquipo')
@endauth


