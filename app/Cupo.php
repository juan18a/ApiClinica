<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cupo extends Model
{
    //

	protected $guarded = [];
    
    public static function CupoPorEspecialidad($especialidad){

        $cupos = DB::table('cupos')
        ->select('cupo_diario')
        ->where('especialidad', '=', $especialidad)
        ->first();

        return $cupos;

    }


}
