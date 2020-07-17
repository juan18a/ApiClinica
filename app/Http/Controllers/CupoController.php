<?php

namespace App\Http\Controllers;

use App\Cupo;
use Illuminate\Http\Request;

class CupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cupos = Cupo::all();
        return response()->json($cupos);
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
      
        $datos = $request->all();
        $cupos = Cupo::create($datos);
        return response()->json($cupos);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cupo  $cupo_id
     * @return \Illuminate\Http\Response
     */
    public function show($cupo_id)
    {
        $cupos = Cupo::find($cupo_id);
        return response()->json($cupos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cupo  $cupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupo $cupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cupo  $cupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupo $cupo)//$cupo_id)
    {
     
        $datos = $request->all();
        $cupo->update($datos);
        $cupos = $cupo;
        return response()->json($cupos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cupo  $cupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cupo $cupo)
    {
        //
    }
}
