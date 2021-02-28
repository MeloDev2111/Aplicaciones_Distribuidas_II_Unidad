@extends('layout')
@section('titulo')
Contactos
 @endsection
@section('contenido')
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
