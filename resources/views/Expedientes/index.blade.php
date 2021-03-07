@extends('layout')
@section('contenido')
    <div class = "container p-2">
        @if (Session::has('Mensaje'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Mensaje') }}
            </div>
        @endif

        <div class = "row">
            <div class ="col-md-8">
                <h2>LISTA DE EMPLEADOS</h2>
            </div>
            <div class ="col-md-2">
                <a class="btn btn-success btn-md" href="{{url('/empleados/crear')}}">Crear Empleado</a>
            </div>
        </div>
        <div class="mt-3">
            <table class = "table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>id</th>
                        <th>Oficina</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>
@endsection
