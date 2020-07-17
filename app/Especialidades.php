<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Especialidades extends Model
{
    use SoftDeletes;
    protected $table = 'especialidades';
    protected $dates = ['deleted_at'];


    public static function ValidarDia($diaSeleccionado, $id_especialidad){

        $dias = new Especialidades();
        $diasEspecialidad = $dias->ConsultarDiasEspecialidad($id_especialidad);

    if($diasEspecialidad){

            $mystring = $diasEspecialidad->dias_atencion;
        $findme   = (string)$diaSeleccionado;
        $pos = strpos($mystring, $findme);
 
        
        if($pos !== false){
 
            return true;
 
        }else{
 
            return false;
        }

    }else{

            return false;

    }

        
 
 
    }


    public static function ConsultarDiasEspecialidad($id_especialidad){

        $diasEspecialidad = DB::table('especialidades')
        ->select('dias_atencion')
        ->where('id', '=', $id_especialidad)
        ->first();
        if($diasEspecialidad){
            return $diasEspecialidad;
        }else{
            return false;
        }
        
   
    }
}
