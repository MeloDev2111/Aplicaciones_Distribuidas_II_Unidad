@extends('layout')
@section('contenido')
    <div class = "container p-1">
        @if (Session::has('Mensaje'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Mensaje') }}
            </div>
        @endif

        <form class = "row" action="{{ url('/empleados/consultar') }}" method="POST">
            @csrf
            <div class ="col-md-8">
                <div class="form-control">
                    <select name="idEmpleado" id="Empleado">
                        @forelse ($empleados as $item)
                        <option value="{{ $item['id'] }}">{{ $item['apellEmp'] }} {{ $item['nombreEmp'] }} - {{ $item['nombreOficina'] }}</option>
                        @empty
                        @endforelse
                    </select>
                    <select name="filter" id="Filtro">
                            <option value="RECIBIDO">Recibido</option>
                            <option value="ENVIADO">Enviado</option>
                            <option value="ATENDIDOS">Respondidos</option>
                    </select>
                </div>
            </div>

            <script type="text/javascript">
                function obtenerIdEmpleado() {
                    var valor = document.getElementById('Empleado').value;
                    return valor;
                }

                function obtenerFiltro() {
                    var valor = document.getElementById('Filtro').value;
                    return valor;
                }
            </script>

            <div class ="col-md-2">
                <input type="submit" class="btn btn-outline-success btn-md" value="Consultar"/>
                <a class="btn btn-warning btn-md" href='/expedientes/crear/'
                onclick="location.href=this.href+obtenerIdEmpleado();return false;">CONSULTAR POR GET</a>
            </div>
            <div class ="col-md-2">
                <a class="btn btn-warning btn-md" href='/expedientes/crear/'
                onclick="location.href=this.href+obtenerIdEmpleado();return false;">Emitir</a>
            </div>
        </form>

        <h2>LISTA DE EMPLEADOS</h2>
        <div class="mt-3">
            <table class = "table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>id</th>
                        <th>Nombres</th>
                        <th></th>
                        <th>Acciones</th>
                    </tr>
                    @isset($expedientes)
                        @forelse ($expedientes as $item)
                        <tr>
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> nombre}}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{url('/oficinas/'.$item->id.'/editar')}}">Editar</a>
                                <form action="{{url('/oficinas/'.$item->id)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}

                                    <input type="submit" onclick="return confirm('Desea borrar?');" class="btn btn-danger btn-sm" value="Borrar"/>
                                </form>
                            </td>
                        </tr>
                        @empty
                            NO HAY OFICINAS REGISTRADAS
                        @endforelse
                    @endisset

                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
    </div>
@endsection
