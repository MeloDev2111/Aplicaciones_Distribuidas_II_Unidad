<?php

namespace App\Http\Controllers;

use App\Oficinas;
use Illuminate\Http\Request;

class OficinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['oficinas']=Oficinas::paginate(5);
        return view('oficinas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oficinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosOficina = request()->except('_token');
        Oficinas::insert($datosOficina);
        return redirect('oficinas')->with('Mensaje','Oficina agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function show(Oficinas $oficinas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oficina = Oficinas::findOrFail($id);

        return view('oficinas.edit',compact('oficina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosOficina = request()->except(['_token','_method']);
        Oficinas::where('id','=',$id)->update($datosOficina);

        return redirect('oficinas')->with('Mensaje','Oficina modificada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Oficinas::destroy($id);
        return redirect('oficinas')->with('Mensaje','Oficina eliminada con exito');
    }
}
