<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Cupo;
use App\Especialidades;
use Illuminate\Http\Request;
use App\Http\Requests\Cita\StoreCitaRequest;


class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //Cita::query()->truncate();
       $citas = Cita::all();
       return response()->json($citas);
   
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
    public function store(StoreCitaRequest $request)
    {
        
        $validar= Cita::ValidarDisponibilidad($request->input('fecha'),
        $request->input('id_especialidad'));

        if($validar){


            $datos = $request->all();
            $citas = Cita::create($datos);
            
            // $citas = new Cita();
            // $citas->asunto = $request->input('asunto');
            // $citas->sintomas = $request->input('sintomas');
            // $citas->fecha = $request->input('fecha');
            // $citas->monto = $request->input('monto');
            // $citas->id_especialidad = $request->input('id_especialidad');
            // $citas->id_paciente = $request->input('id_paciente');
            // $citas->status = 1;
            // $citas->save();

            return response()->json($citas); 
        }
            return response()->json(['message' => 'No se Proceso la Cita', 400]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit(Cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cita $cita)
    {
        //
    }
}
