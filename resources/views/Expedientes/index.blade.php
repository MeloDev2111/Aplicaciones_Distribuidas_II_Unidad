@extends('layout')
@section('contenido')
    <div class = "container p-1">
        @if (Session::has('Mensaje'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Mensaje') }}
            </div>
        @endif

        <div class = "row">
            <div class ="col-md-8 h5">
                <select name="idEmpleado" id="Empleado">
                    @forelse ($empleados as $item)
                    <option value="{{ $item['id'] }}">{{ $item['apellEmp'] }} {{ $item['nombreEmp'] }} - {{ $item['nombreOficina'] }}</option>
                    @empty
                    @endforelse
                </select>
                <select name="filter" id="Filtro">
                        <option value="1">Enviados</option>
                        <option value="2">Recibidos</option>
                        <option value='3'>Atendidos</option>
                        <option value="4">Todos</option>
                </select>
            </div>

            <div class ="col-md-4">
                <a class="btn btn-outline-success btn-md" href='/expedientes/'
                onclick="location.href=this.href+obtenerIdEmpleado()+'/'+obtenerFiltro();return false;">Consultar</a>

                <a class="btn btn-warning btn-md" href='/expedientes/crear/'
                onclick="location.href=this.href+obtenerIdEmpleado();return false;">Emitir</a>
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

            @isset($configIdEmpleado,$configFiltro)
                <script type="text/javascript">
                    document.ready = document.getElementById("Empleado").value={{$configIdEmpleado}};
                    document.ready = document.getElementById("Filtro").value={{$configIdFiltro}};
                </script>
            @endisset

        </div>

        @isset($expedientes,$configFiltro)
            <h2>LISTA DE EXPEDIENTES {{$configFiltro}}</h2>
            <div class="mt-3">
                <table class = "table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col"> N° de registro</th>
                            <th scope="col">Oficina Emisora</th>
                            <th scope="col">Oficina Receptora</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Atención</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($expedientes as $item)
                        <tr>
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> nombreOficinaEmisora}}</td>
                            <td>{{$item -> nombreOficinaReceptora}}</td>
                            <td>{{$item -> tipo}}</td>
                            <td>{{$item -> descripcion}}</td>
                            @isset($item['atencion'])
                                <td>{{$item -> atencion}}</td>
                            @else
                                <td>Sin atender</td>
                            @endisset

                            @switch($configFiltro)
                                @case("ENVIADOS")
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{url('/expedientes/'.$item->id.'/editar')}}">Editar</a>
                                        <form action="{{url('/expedientes/'.$item->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}

                                            <input type="submit" onclick="return confirm('Desea borrar?');" class="btn btn-danger btn-sm" value="Borrar"/>
                                        </form>
                                    </td>
                                    @break
                                @case("RECIBIDOS")
                                    <td>
                                        <a class="btn btn-success btn-sm" href='/expedientes/atender/'
                                        onclick="location.href=this.href+obtenerIdEmpleado()+'/'+{{$item -> id}};return false;">Atender</a>
                                    </td>
                                    @break
                                @case("ATENDIDOS")
                                    <td>
                                        <form action="{{url('/expedientes/'.$item->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}

                                            <input type="submit" onclick="return confirm('Desea borrar?');" class="btn btn-danger btn-sm" value="Borrar"/>
                                        </form>
                                    </td>
                                    @break
                                @default

                            @endswitch

                        </tr>
                        @empty
                            <h5>NO HAY EXPEDIENTES REGISTRADOS {{$configFiltro}}</h5>
                        @endforelse
                    </tbody>
                </table>
                {{$expedientes->links()}}
            </div>

        @else
            <h4>CONSULTA POR FAVOR</h4>
        @endisset


    </div>
@endsection
