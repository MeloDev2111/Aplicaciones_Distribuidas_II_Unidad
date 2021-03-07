@extends('layout')

@section('titulo')
    Portafolio
@endsection

@section('contenido')
    <h1>Portafolio de Clientes laravel 1era forma</h1>
    <ul>
        @isset($portafolio)
            @foreach($portafolio as $portafolioI)
                <li>{{ $portafolioI['titulo'] }}</li>
            @endforeach
        @else
            <li>No hay proyectos en el portafolio</li>
        @endif
    </ul>
    <h1>Portafolio de Clientes laravel 2da forma mas pro</h1>
    <ul>
        @forelse($portafolio as $portafolioI)
            <li>{{ $portafolioI['titulo'] }}
                <small>{{$loop -> first ? 'Es el primero':''}}</small>
                <small>{{$loop -> last ? 'Es el ultimo':''}}</small></li>
        @empty
            <li>No hay proyectos en el portafolio</li>
        @endforelse
    </ul>
    <h1>CASILLA DE EXPEDIENTES RECIBIDOS</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"> N° de registro</th>
                <th scope="col">fecha</th>
                <th scope="col">hora</th>
                <th scope="col">Oficina Emitida</th>
                <th scope="col">tipo</th>
                <th scope="col">expediente</th>
                <th scope="col">descripción</th>
                <th scope="col">atención</th>
                <th scope="col">recepción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">2021-02-14-1</th>
                <td>14/02/2021</td>
                <td>15:58</td>
                <td>RECURSOS HUMANOS</td>
                <td>OFICIO</td>
                <td>Expediente.pdf</td>
                <td>Solicito informe de ingresos anuales</td>
                <td>PENDIENTE</td>
                <td><button type="submit" class="btn btn-success">ATENDER</button></td>
            </tr>
            <tr>
                <th scope="row">2021-02-14-2</th>
                <td>14/02/2021</td>
                <td>15:58</td>
                <td>CHUPIS</td>
                <td>CARTA</td>
                <td>Expediente.docx</td>
                <td>Solicito saludo de Escanor Blocks</td>
                <td>ATENDIDO</td>
                <td>Nelvin Lujan Rojas</td>s
            </tr>
        </tbody>
    </table>
    <h1>CASILLA DE EXPEDIENTES EMITIDOS</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"> N° de registro</th>
                <th scope="col">fecha</th>
                <th scope="col">hora</th>
                <th scope="col">Oficina DESTINO</th>
                <th scope="col">tipo</th>
                <th scope="col">expediente</th>
                <th scope="col">descripción</th>
                <th scope="col">atención</th>
                <th scope="col">recepción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">2021-02-14-1</th>
                <td>14/02/2021</td>
                <td>15:58</td>
                <td>RECURSOS HUMANOS</td>
                <td>OFICIO</td>
                <td>Expediente.pdf</td>
                <td>Solicito informe de ingresos anuales</td>
                <td>PENDIENTE</td>
                <td>-</td>
            </tr>
            <tr>
                <th scope="row">2021-02-14-2</th>
                <td>14/02/2021</td>
                <td>15:58</td>
                <td>CHUPIS</td>
                <td>CARTA</td>
                <td>Expediente.docx</td>
                <td>Solicito saludo de Escanor Blocks</td>
                <td>ATENDIDO</td>
                <td>Nelvin Lujan Rojas</td>s
            </tr>
        </tbody>
    </table>
@endsection
