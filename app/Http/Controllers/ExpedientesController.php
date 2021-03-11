<?php

namespace App\Http\Controllers;

use App\Expedientes;
use App\Empleados;
use App\Oficinas;
use Illuminate\Http\Request;

class ExpedientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados']=Empleados::paginate();

        foreach ($datos['empleados'] as $item) {
            $oficina = Oficinas::find($item['idOficina']);
            $item['nombreOficina'] = $oficina['nombre'];
        }

        return view('expedientes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $empleado = Empleados::find($id);
        $datos['empleado'] = $empleado;
        $datos['oficinaActual'] = Oficinas::find($empleado['idOficina']);

        $datos['oficinas']=Oficinas::paginate();

        return view('expedientes.create',$datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datosVista=request()->all();

        $idEmpleado = $datosVista['idEmp'];

        //switch de conversion int a String 1 - TIPO

        $datosExpediente=[
            'idOficinaEmisora'=>$datosVista['idOficinaEmisora'],
            'idOficinaReceptora'=>$datosVista['idOficinaReceptora'],
            'descripcion'=>$datosVista['descripcion'],
        ];


        switch ($datosVista['tipo']) {
            case '1':
                $datosExpediente['tipo']="Oficio";
                break;
            case '2':
                $datosExpediente['tipo'] ="Carta";
                break;
            default:
                $datosExpediente['tipo']="No especificado";
                break;
        }

        $datosExpediente['fecha'] = now()->format('Y-m-d');;
        $datosExpediente['hora'] = now()->format('H:i:s');;

        try {
            Expedientes::insert($datosExpediente);
            return redirect('expedientes/'.$idEmpleado.'/1')->with('Mensaje','Emitido con exito');
        } catch (\Throwable $th) {
            return redirect('expediente')->with('Mensaje','Error al emitir');
        }

        //return response()->json($datosVista);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function show($id,$estado)
    {
        $datos['empleados']=Empleados::paginate();

        foreach ($datos['empleados'] as $item) {
            $oficinaE = Oficinas::find($item['idOficina']);
            $newColumn = ['nombreOficina'=>$oficinaE['nombre']];
            $item['nombreOficina'] = $oficinaE['nombre'];
            if ($item['id'] == $id) {
                $oficinaActual = $oficinaE;
            }
        }

        switch ($estado) {
            case '1':
                $datos['expedientes']=Expedientes::where('idOficinaEmisora','=',$oficinaActual['id'])
                ->whereNull('atencion')->paginate();

                $datos['configFiltro'] = "ENVIADOS";
                break;
            case '2':
                $datos['expedientes']=Expedientes::where('idOficinaReceptora','=',$oficinaActual['id'])
                ->whereNull('atencion')->paginate();


                $datos['configFiltro'] = "RECIBIDOS";
                break;
            case '3':
                $idOfiActual = $oficinaActual['id'];
                $datos['expedientes']=Expedientes::whereNotNull('atencion')
                ->where(function($query) use($idOfiActual) {
                    $query->where('idOficinaReceptora','=', $idOfiActual )
                        ->orWhere('idOficinaEmisora','=', $idOfiActual );
                })
                ->paginate();

                $datos['configFiltro'] = "ATENDIDOS";
                break;
            default:
                $datos['expedientes']=Expedientes::paginate();

                $datos['configFiltro'] = "TODOS";
            break;
        }


        foreach ($datos['expedientes'] as $item) {
            $oficina = Oficinas::find($item['idOficinaEmisora']);
            $item['nombreOficinaEmisora'] = $oficina['nombre'];

            $oficina = Oficinas::find($item['idOficinaReceptora']);
            $item['nombreOficinaReceptora'] = $oficina['nombre'];
        }

        $datos['configIdEmpleado'] = $id;
        $datos['configIdFiltro'] = $estado;

        return view('expedientes.index',$datos);
    }


    public function atender($idEmp,$idExp)
    {
        $empleado = Empleados::find($idEmp);

        $expediente = Expedientes::where('nroRegistro','=',$idExp);

        $apellido = $empleado['apellEmp'];
        $nombres = $empleado['nombreEmp'];

        try {
            $expediente->update([
                'atencion' => $apellido." ".$nombres,
            ]);
            //Expedientes::where('nroRegistro','=',$idExp)->update($expediente);
            return redirect('expedientes/'.$idEmp.'/2')->with('Mensaje','Atendido con exito');
        } catch (\Throwable $th) {
            printf($th);
            return redirect('expedientes')->with('Mensaje','Error al atender');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos['oficinas'] = Oficinas::paginate();
        $datos['expediente']  = Expedientes::where('nroRegistro','=',$id)->get()->toArray()[0];
        switch ($datos['expediente']['tipo']) {
            case 'Oficio':
                $datos['expediente']['idTipo'] = '1';
                break;
            case 'Carta':
                $datos['expediente']['idTipo'] = '2';
                break;
            default:
                $datos['expediente']['idTipo'] = '3';
                break;
        }

        return view('expedientes.edit',$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosVista=request()->all();

        $datosExpediente=[
            'idOficinaEmisora'=>$datosVista['idOficinaEmisora'],
            'idOficinaReceptora'=>$datosVista['idOficinaReceptora'],
            'descripcion'=>$datosVista['descripcion'],
        ];

        switch ($datosVista['tipo']) {
            case '1':
                $datosExpediente['tipo']="Oficio";
                break;
            case '2':
                $datosExpediente['tipo'] ="Carta";
                break;
            default:
                $datosExpediente['tipo']="No especificado";
                break;
        }

        $expediente = Expedientes::where('nroRegistro','=',$id);

        try {
            $expediente->update($datosExpediente);
            return redirect('expedientes')->with('Mensaje','Modificado con exito');
        } catch (\Throwable $th) {
            printf($th);
            return redirect('expedientes')->with('Mensaje','Error al Modificar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $expediente = Expedientes::where('nroRegistro','=',$id);
            $expediente->delete();
            return redirect('expedientes')->with('Mensaje','Expediente eliminado con exito');
        } catch (\Throwable $th) {
            return redirect('expedientes')->with('Mensaje','Error al Eliminar');
        }
    }
}
