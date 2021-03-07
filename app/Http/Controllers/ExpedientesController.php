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
            $newColumn = ['nombreOficina'=>$oficina['nombre']];
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
        echo "show ".$id." ".$estado;
    }

    public function consultar(Request $request){
        $datosVista=request()->all();
        return response()->json($datosVista);
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
