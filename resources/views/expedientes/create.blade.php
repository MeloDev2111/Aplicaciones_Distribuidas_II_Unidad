@extends('layout')
@section('contenido')
<h4>{{$empleado->apellEmp }} {{$empleado->nombreEmp }} emitiendo expediente desde oficina {{$oficinaActual->nombre}}</h4>
    <div class = "card card-body">
        <form action="{{ url('/expedientes') }}" method="POST">
            @csrf
            <input type="hidden" name="idEmp" value="{{$empleado->id}}">

            <div class="form-group h2 row">
                <label class="col-md-3" for="Fecha">{{ 'Fecha' }} </label>
                <input class="col-md-6 h5" name="fecha" type="date" id="Fecha" readonly/><br>
            </div>
            <script>
                var f = new Date();
                var currentDate = f.toISOString().slice(0,10);
                document.getElementById("Fecha").value= currentDate;
            </script>

            <div class="form-group h2 row">
                <label class="col-md-3" for="OficinaEmisora" >{{ __('Emisor') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="idOficinaEmisora" id="OficinaEmisora" style="pointer-events: none;" READONLY>
                        @forelse ($oficinas as $item)
                            <option value="{{ $item['id'] }}">{{ $item['id'] }} - {{ $item['nombre'] }}</option>
                        @empty
                            Oficinas no Registradas
                        @endforelse
                    </select>
                    <script>
                        document.ready = document.getElementById("OficinaEmisora").value={{$oficinaActual->id}};
                    </script>
                </div>

            </div>

            <div class="form-group h2 row">
                <label class="col-md-3" for="OficinaReceptora" >{{ __('Receptor') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="idOficinaReceptora" id="OficinaReceptora">
                        @forelse ($oficinas as $item)
                            @if ($item['id']!=$oficinaActual['id'])
                                <option value="{{ $item['id'] }}">{{ $item['id'] }} - {{ $item['nombre'] }}</option>
                            @endif
                        @empty
                            Oficinas no Registradas
                        @endforelse
                    </select>
                </div>
            </div>

            <div class="form-group h2 row">
                <label class="col-md-3" for="Tipo" >{{ __('Tipo') }}</label>

                <div class="col-md-6">
                    <select class="h4" name="tipo" id="Tipo">
                        <option value="1">Oficio</option>
                        <option value="2">Carta</option>
                        <option value='3'>No especificado</option>
                    </select>
                </div>
            </div>

            <div class="form-group h2 row">
                <label class="col-md-3" for="Asunto">{{ 'Asunto' }} </label>
                <input class="col-md-6 h5" name="asunto" type="text" maxlength="150"/><br>
            </div>

            <div class="form-group h2 row">
                <label class="col-md-3" for="Descripcion">{{ 'Descr.' }} </label>
                <textarea class="col-md-6 h5" name="descripcion" id="Descripcion" autocomplete="description"
                placeholder="Ingresa una descripcion del expediente" maxlength="250" rows="4"></textarea>
            </div>

            <div class="form-group">
                <input class="btn btn-warning btn-lg" type="submit" value="Emitir expediente"/><br>
            </div>

        </form>
    </div>
@endsection
