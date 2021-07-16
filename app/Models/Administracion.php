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

    public static function ListarDepenencias(){
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia ORDER BY NOMBRE_DEPENDENCIA');
        return $ListarDepenencias;
    }

    public static function ListarDepenenciasActivo(){
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia ORDER BY NOMBRE_DEPENDENCIA WHERE ESTADO = ?',[1]);
        return $ListarDepenencias;
    }

    public static function ListarDepenenciasId($IdRol){
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia WHERE ID_DEPENDENCIA = ?',[$IdRol]);
        return $ListarDepenencias;
    }

    public static function CrearDependencia($Nombre,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearDependencia = DB::Insert('INSERT INTO dependencia (NOMBRE_DEPENDENCIA, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        values (?,?,?,?)',
                                        [$Nombre,1,$fechaCreacion,1]);
        return $CrearDependencia;
    }

    public static function ActualizarDependencia($Nombre,$Usuario,$Estado,$IdDependencia){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarDependencia = DB::Update('UPDATE dependencia SET
                                            NOMBRE_DEPENDENCIA = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_DEPENDENCIA = ?',
                                            [$Nombre,$Estado,$fechaActualizacion,$Usuario,$IdDependencia]);
        return $ActualizarDependencia;
    }

    public static function ListarRoles(){
        $ListarRoles = DB::Select('SELECT * FROM roles ORDER BY NOMBRE_ROL');
        return $ListarRoles;
    }

    public static function ListarRolesActivo(){
        $ListarRoles = DB::Select('SELECT * FROM roles ORDER BY NOMBRE_ROL WHERE ESTADO = ?',[1]);
        return $ListarRoles;
    }

    public static function ListarRolesId($IdRol){
        $ListarRoles = DB::Select('SELECT * FROM roles WHERE ID_ROL = ?',[$IdRol]);
        return $ListarRoles;
    }

    public static function CrearRol($Nombre,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearRol = DB::Insert('INSERT INTO roles (NOMBRE_ROL, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        values (?,?,?,?)',
                                        [$Nombre,1,$fechaCreacion,1]);
        return $CrearRol;
    }

    public static function ActualizarRol($Nombre,$Usuario,$Estado,$IdRol){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarRol = DB::Update('UPDATE roles SET
                                            NOMBRE_ROL = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_ROL = ?',
                                            [$Nombre,$Estado,$fechaActualizacion,$Usuario,$IdRol]);
        return $ActualizarRol;
    }
}
