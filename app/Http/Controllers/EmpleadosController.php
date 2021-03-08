<?php

namespace App\Http\Controllers;

use App\Empleados;
use App\Oficinas;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados']=Empleados::paginate("5");

        foreach ($datos['empleados'] as $item) {
            $oficina = Oficinas::find($item['idOficina']);
            $newColumn = ['nombreOficina'=>$oficina['nombre']];
            $item['nombreOficina'] = $oficina['nombre'];
        }

        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['oficinas']=Oficinas::paginate();

        return view('empleados.create',$datos);
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
        $datosEmpleado=[
            //agregar DNI
            'nombreEmp'=>$datosVista['Nombres'],
            'apellEmp'=>$datosVista['Apellidos'],
            'idOficina'=>$datosVista['idOficina']
        ];
        try {
            Empleados::insert($datosEmpleado);
            return redirect('empleados')->with('Mensaje','Agregado con exito');
        } catch (\Throwable $th) {
            return redirect('empleados')->with('Mensaje','Error al guardar');
        }

        //return response()->json($datosOficina);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos['empleado'] = Empleados::find($id);
        $datos['oficinas'] = Oficinas::paginate();

        return view('empleados.edit',$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos =[
            'Nombres'=>'required|string|max:50',
            'Apellidos'=>'required|string|max:50',
        ];

        $Mensajes=["required"=>'El :atribute es requerido'];

        $this->validate($request,$campos,$Mensajes);

        $datosVista = request();

        $datosEmpleado=[
            //agregar DNI
            'nombreEmp'=>$datosVista['Nombres'],
            'apellEmp'=>$datosVista['Apellidos'],
            'idOficina'=>$datosVista['idOficina']
        ];
        try {
            Empleados::where('id','=',$id)->update($datosEmpleado);
            return redirect('empleados')->with('Mensaje','modificada con exito');
        } catch (\Throwable $th) {
            return redirect('empleados')->with('Mensaje','Error al modificar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Empleados::destroy($id);
            return redirect('empleados')->with('Mensaje','Empleado eliminado con exito');
        } catch (\Throwable $th) {
            return redirect('empleados')->with('Mensaje','Error al Eliminar');
        }
    }
}
