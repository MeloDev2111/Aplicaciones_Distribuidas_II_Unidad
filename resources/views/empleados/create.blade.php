@extends('layout')
@section('contenido')
    <div class = "card card-body">
        <form action="{{ url('/empleados') }}" method="POST">
            @csrf

            <div class="form-group h2 row">
                <span class="col-md-3" >DNI:</span>
                <input class="col-md-6" type="number" name="DNI" autocomplete="DNI" max="99999999" min="10000000" required/>
            </div>

            <div class="form-group h2 row">
                <label class="col-md-3" for="Nombres" >{{ 'Nombres' }} </label>
                <input class="col-md-6" type="text" name="Nombres" id="Nombres" autocomplete="first-name" required
                maxlength="50"/>
            </div>

            <div class="form-group h2 row">
                <label class="col-md-3" for="Apellidos">{{ 'Apellidos' }} </label>
                <input class="col-md-6" type="text" name="Apellidos" id="Apellidos" autocomplete="family-name"
                maxlength="50" required/>
            </div>


            <div class="form-group h2 row">
                <label class="col-md-3" for="Oficina" >{{ __('Oficina') }}</label>

                <div class="col-md-6">
                    <select class="form-control h2" name="idOficina" id="Oficina">
                        @forelse ($oficinas as $item)
                            <option value="{{ $item['id'] }}">{{ $item['id'] }} - {{ $item['nombre'] }}</option>
                        @empty
                            Oficinas no Registradas
                        @endforelse
                    </select>
                </div>

            </div>

            <div class="form-group">
                <input class="btn btn-success btn-lg" type="submit" value="Guardar Empleado"/><br>
            </div>
        </form>
    </div>
@endsection
