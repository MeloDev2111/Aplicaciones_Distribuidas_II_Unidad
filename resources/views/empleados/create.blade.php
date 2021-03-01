@extends('layout')
@section('contenido')
    <div class = "card card-body">
        <form action="{{ url('/empleados') }}" method="POST">
            @csrf

            <h2 class="form-group">
                <label for="Nombres">{{ 'Nombres' }} </label>
                <input type="text" name="Nombres" id="Nombres" autocomplete="name" required
                maxlength="50"/>
            </h2>

            <h2 class="form-group">
                <label for="Apellidos">{{ 'Apellidos' }} </label>
                <input type="text" name="Apellidos" id="Apellidos" autocomplete="family-name"
                maxlength="50" required/>
            </h2>



            <h2 class="form-group">
                <span>DNI:</span>
                <input type="number" name="DNI" autocomplete="DNI" max="99999999" min="10000000" required/>
            </h2>

            <div class="form-group">
                <input class="btn btn-success btn-lg" name="GuardarEmpleado" type="submit" value="Guardar Empleado"/><br>
            </div>
        </form>
    </div>
@endsection
