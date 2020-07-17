<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Cupo;
use App\Especialidades;

class Cita extends Model
{
    //

    public static function ValidarDisponibilidad($fecha, $especialidad){

        $objCita = new Cita();
        //Conteo de Citas por fecha y especialidad
      
        $diaSeleccionado = $objCita->ConvertirFechaDia($fecha);
        //Consultar dia seleccionado por el usuario con los dias de atencion de la especialidad
        $consultarDia = Especialidades::ValidarDia($diaSeleccionado, $especialidad);


        if($consultarDia){

            $conteo = $objCita->ConteoCitas($fecha, $especialidad);
            //Consulta de Cupos por especialidad
            $cupos = Cupo::CupoPorEspecialidad($especialidad);
            //conversion de fecha a dia en formato númerico;

            if(!$conteo){

                $conteoCitas = 0;
                
            }else{
                $conteoCitas = $conteo->citas_count;

            }

                if($cupos->cupo_diario > $conteoCitas){
        
                    return true;
        
                }else{
        
                    return false;
                
                }
                
         

        }else{

                
            return false;

        }



        
    }

    public static function ConteoCitas($fecha, $id_especialidad){

        $citas_count= DB::table('citas')
        ->select(DB::raw('count(*) as citas_count'))
        ->where('fecha', '=', $fecha)
        ->where('id_especialidad', '=', $id_especialidad)
        ->groupBy('status')->first();
        return $citas_count;
        
    
    }

    public static function ConvertirFechaDia($fecha){

        $diaSeleccionado = date("w", strtotime($fecha));
        return $diaSeleccionado;

    } 





}
