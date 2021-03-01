@extends('layout')
@section('contenido')

    <div class = "card card-body">
        <form action="{{ url('/oficinas/'.$oficina->id) }}" method="POST">
            @csrf
            {{method_field('PATCH')}}
            <h2 class="form-group">
                <label for="Nombre">{{ 'Nombres' }} </label>
                <input type="text" name="Nombre" id="Nombre" autocomplete="oficina" required
                maxlength="50" value="{{$oficina->nombre}}"/>
            </h2>

            <div class="form-group">
                <input class="btn btn-info btn-lg" type="submit" value="Actualizar"/><br>
            </div>
        </form>
    </div>
@endsection

