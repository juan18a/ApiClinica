<?php

namespace App\Http\Controllers;

use App\Especialidades;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = Especialidades::all();
        return response()->json($especialidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $d= $request->input('dias_atencion');
        $dias_atencion = implode(",", $d);


        $especialidad = new Especialidades();
        $especialidad->especialidad = $request->input('especialidad');
        $especialidad->img_foto = $request->input('img_foto');
        $especialidad->dias_atencion = $dias_atencion;
        $especialidad->save();
        return response()->json($especialidad);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidades  $especialidad_id
     * @return \Illuminate\Http\Response
     */
    public function show($especialidad_id)
    {
        $especialidades = Especialidades::find($especialidad_id);
        return response()->json($especialidades);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidades  $especialidades
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidades $especialidades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidades $especialidad_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $especialidad_id)
    {
        $especialidad = Especialidades::find($especialidad_id);
        $especialidad->especialidad = $request->input('especialidad');
        $especialidad->img_foto = $request->input('img_foto');
        $especialidad->save();
        return response()->json($especialidad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidades  $especialidad_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($especialidad_id)
    {
        if(Especialidades::destroy($especialidad_id)){

            Especialidades::withTrashed()->get();
            
        }
    }
}
