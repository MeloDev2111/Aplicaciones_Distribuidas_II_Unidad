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


            <div class="form-group row">
                <label for="Oficina" class="col-md-4 col-form-label text-md-right">{{ __('Oficina') }}</label>

                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle col-md-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Oficina
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div>

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
