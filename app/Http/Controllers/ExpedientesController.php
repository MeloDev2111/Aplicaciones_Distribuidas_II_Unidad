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
        $oficina = Oficinas::find($empleado['idOficina']);
        print($empleado);
        print($oficina);
        echo "Hola ".$id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
                ->whereNull('atencion')->paginate("10");

                $datos['configFiltro'] = "ENVIADOS";
                break;
            case '2':
                $datos['expedientes']=Expedientes::where('idOficinaReceptora','=',$oficinaActual['id'])
                ->whereNull('atencion')->paginate("10");


                $datos['configFiltro'] = "RECIBIDOS";
                break;
            case '3':
                $datos['expedientes']=Expedientes::where('idOficinaReceptora','=',$oficinaActual['id'])
                ->orWhere('idOficinaEmisora','=',$oficinaActual['id'])
                ->whereNotNull('atencion')
                ->paginate("10");

                $datos['configFiltro'] = "ATENDIDOS";
                break;
            default:
                $datos['expedientes']=Expedientes::paginate("10");

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
        echo "Hola ".$idEmp."MODIFICATE ESTA ".$idExp;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
