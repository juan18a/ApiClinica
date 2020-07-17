<?php

namespace App\Http\Controllers;

use App\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
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
        $pacientes = new Paciente();
        $pacientes->name = $request->input('name');
        $pacientes->lastname = $request->input('lastname');
        $pacientes->edad = $request->input('edad');
        $pacientes->cedulado = $request->input('cedulado');
        $pacientes->cedula = $request->input('cedula');
        $pacientes->direccion = $request->input('direccion');
        $pacientes->vinculo_pariente = $request->input('vinculo_pariente');
        $pacientes->cedula_pariente = $request->input('cedula_pariente');
        $pacientes->save();
        return response()->json($pacientes);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente_id
     * @return \Illuminate\Http\Response
     */
    public function show($paciente_id)
    {
        $pacientes = Paciente::find($paciente_id);
        return response()->json($pacientes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paciente_id)
    {
        $pacientes = Paciente::find($paciente_id);
        $pacientes->name = $request->input('name');
        $pacientes->lastname = $request->input('lastname');
        $pacientes->edad = $request->input('edad');
        $pacientes->cedulado = $request->input('cedulado');
        $pacientes->cedula = $request->input('cedula');
        $pacientes->direccion = $request->input('direccion');
        $pacientes->vinculo_pariente = $request->input('vinculo_pariente');
        $pacientes->cedula_pariente = $request->input('cedula_pariente');
        $pacientes->save();
        return response()->json($pacientes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
