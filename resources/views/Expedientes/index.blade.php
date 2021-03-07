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
                        <option value={{"RECIBIDOS"}}>Recibidos</option>
                        <option value={{"ENVIADOS"}}>Enviados</option>
                        <option value={{"ATENDIDOS"}}>Respondidos</option>
                        <option value=" {{"TODOS"}} ">Todos</option>
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
                    document.ready = document.getElementById("Filtro").value={{$configFiltro}};
                </script>
            @endisset

        </div>

        @isset($configFiltro)
            <h2>LISTA DE EXPEDIENTES {{$configFiltro}}</h2>
        @else
            <h2>LISTA DE EXPEDIENTES</h2>
        @endisset

        <div class="mt-3">
            <table class = "table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col"> N° de registro</th>
                        <th scope="col">Oficina Emisora</th>
                        <th scope="col">Oficina Receptora</th>
                        <th scope="col">tipo</th>
                        <th scope="col">descripción</th>
                        <th scope="col">atención</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($expedientes)
                        @forelse ($expedientes as $item)
                        <tr>
                            <td>{{$item -> id}}</td>
                            <td>{{$item -> nombreOficinaEmisora}}</td>
                            <td>{{$item -> nombreOficinaReceptora}}</td>
                            <td>{{$item -> tipo}}</td>
                            <td>{{$item -> descripcion}}</td>
                            @isset($item['atencion'])
                                <td>{{isset($item -> atencion)}}</td>
                            @else
                                <td>"Sin atender"</td>
                            @endisset

                            <td>
                                <a class="btn btn-info btn-sm" href="{{url('/expedientes/'.$item->id.'/editar')}}">Editar</a>
                                <form action="{{url('/expedientes/'.$item->id)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}

                                    <input type="submit" onclick="return confirm('Desea borrar?');" class="btn btn-danger btn-sm" value="Borrar"/>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <h2>NO HAY OFICINAS REGISTRADAS</h2>
                        @endforelse
                    @endisset
                </tbody>
            </table>

        </div>

        2da forma mas conveniente

        @isset($expedientes,$configFiltro)
            <h2>LISTA DE EXPEDIENTES {{$configFiltro}}</h2>
            <div class="mt-3">
                <table class = "table table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col"> N° de registro</th>
                            <th scope="col">Oficina Emisora</th>
                            <th scope="col">Oficina Receptora</th>
                            <th scope="col">tipo</th>
                            <th scope="col">descripción</th>
                            <th scope="col">atención</th>
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
                                <td>{{isset($item -> atencion)}}</td>
                            @else
                                <td>"Sin atender"</td>
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
                            <h3>NO HAY EXPEDIENTES REGISTRADOS</h3>
                        @endforelse
                    </tbody>
                </table>

            </div>

        @else
            <h3>NO HAY EXPEDIENTES REGISTRADOS</h3>
        @endisset


    </div>
@endsection
