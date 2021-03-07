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

    <h1>Bienvenido a Contacto</h1>
    <div class = "container p-2">
        <div class ="col-md-10">
            <div class = "card card-body">
                <form action="operaciones/agregarCurso.php" method="POST">
                    <h2 class="form-group">
                        <span>Fecha:</span>
                        <horario id="Horario">
                            <input type="date" name="date" required/>
                        </horario>
                    </h2>

                    <h2 class="form-group">
                        <span>Hora:</span>
                        <horario id="Horario">
                            <input type="time" min="08:00" max="22:00" name="hora" required/>
                        </horario>
                    </h2>

                    <h2 class="form-group">
                        <span>Nombre del curso:</span>
                        <input type="text" name="nombreCurso" autocomplete="course" required
                        maxlength="50"/>
                    </h2>
                    <br>
                    <h2 class="form-group">
                        <span>Dia:</span>
                        <select name="dia">
                            <option>Lunes</option>
                            <option>Martes</option>
                            <option>Miercoles</option>
                            <option>Jueves</option>
                            <option>Viernes</option>
                            <option>Sabado</option>
                        </select>
                    </h2>
                    <h2 class="form-group">
                        <span>Horario:</span>
                        <horario id="Horario">
                            <input type="time" min="08:00" max="22:00" name="horaEntrada" step="300" required/>
                            a
                            <input type="time" min="08:00" max="22:00" name="horaSalida" step="300" required/>
                        </horario>
                    </h2>
                    <br>
                    <h2 class="form-group">
                        <span>Nombre del Docente:</span>
                        <input type="text" name="docente" autocomplete="full name" maxlength="50" required/>
                    </h2>
                    <div class="form-group ">
                        <input class="btn btn-danger btn-lg bg-gradient" name="GuardarCurso" type="submit" value="Guardar Curso"/>
                    </div>
                </form>
            </div>
            <br>
        </div>
    </div>
@endsection
