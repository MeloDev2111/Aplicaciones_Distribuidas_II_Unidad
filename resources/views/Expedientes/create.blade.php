@extends('layout')
@section('contenido')

    <div class = "card card-body">
        <form action="{{ url('/oficinas') }}" method="POST">
            @csrf

            <h2 class="form-group">
                <label for="Nombre">{{ 'Nombre' }} </label>
                <input type="text" name="Nombre" id="Nombre" autocomplete="oficina" required
                maxlength="50"/>
            </h2>

            <div class="form-group">
                <input class="btn btn-success btn-lg" type="submit" value="Guardar Oficina"/><br>
            </div>
        </form>
    </div>
@endsection

