@extends('layout')
@section('contenido')
    <div class = "container p-2">
        @if (Session::has('Mensaje')){{
            Session::get('Mensaje')
        }}
        @endif
        <div class = "row">
            <div class ="col-md-8">
                <h2>LISTADO DE OFICINAS</h2>
            </div>
            <div class ="col-md-2">
                <a class="btn btn-success btn-md" href="{{url('/oficinas/crear')}}">Crear Oficina</a>
            </div>
        </div>
        <div class="mt-3">
            <table class = "table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($oficinas as $item)
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
                </tbody>
            </table>
        </div>
    </div>
@endsection
