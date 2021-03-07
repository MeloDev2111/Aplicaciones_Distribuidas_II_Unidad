@extends('layout')
@section('contenido')
    @if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class = "card card-body">
        <form action="{{ url('/empleados/'.$empleado->id) }}" method="POST">
            @csrf
            {{method_field('PATCH')}}
            <div class="form-group h2 row">
                <span class="col-md-2" >DNI:</span>
                <input class="col-md-6" type="number" name="DNI" autocomplete="DNI" max="99999999" min="10000000" required
                value="$empleado->DNI" />
            </div>

            <div class="form-group h2 row">
                <label class="col-md-2" for="Nombres" >{{ 'Nombres' }} </label>
                <input class="col-md-6" type="text" name="Nombres" id="Nombres" autocomplete="first-name" required
                maxlength="50" value="{{$empleado->apellEmp}}"/>
            </div>

            <div class="form-group h2 row">
                <label class="col-md-2" for="Apellidos">{{ 'Apellidos' }} </label>
                <input class="col-md-6" type="text" name="Apellidos" id="Apellidos" autocomplete="family-name"
                maxlength="50" required value="{{$empleado->nombreEmp}}"/>
            </div>


            <div class="form-group h2 row">
                <label class="col-md-2" for="Oficinas" >{{ __('Oficina') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="idOficina" id="Oficinas">
                        @forelse ($oficinas as $item)
                            <option value="{{ $item['id'] }}">{{ $item['id'] }} - {{ $item['nombre'] }}</option>
                        @empty
                            Oficinas no Registradas
                        @endforelse
                    </select>
                    <script>
                        document.ready = document.getElementById("Oficinas").value={{$empleado->idOficina}};
                    </script>
                </div>

            </div>

            <div class="form-group">
                <input class="btn btn-info btn-lg" type="submit" value="Actualizar"/><br>
            </div>
        </form>
    </div>
@endsection
