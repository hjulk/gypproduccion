<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Administracion extends Model
{
    use HasFactory;

    public static function getNotificacionesAviso(){
        $getNotificacionesAviso = DB::Select("SELECT * FROM notificaciones WHERE ESTADO = 1 ORDER BY 1 DESC LIMIT 10");
        return $getNotificacionesAviso;
    }

    public static function getContactenos(){
        $getContactenos = DB::Select("SELECT * FROM form_contacto ORDER BY 1 DESC LIMIT 10");
        return $getContactenos;
    }

    public static function getHojaVida(){
        $getHojaVida = DB::Select("SELECT * FROM form_trabajo ORDER BY 1 DESC LIMIT 10");
        return $getHojaVida;
    }

    public static function tipoDocumento($idDocumento){
        $getHojaVida = DB::Select("SELECT * FROM tipo_documento WHERE ID_DOCUMENTO = $idDocumento AND ESTADO = 1");
        return $getHojaVida;
    }
}
