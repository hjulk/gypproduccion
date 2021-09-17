<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GYPBogota extends Model
{
    use HasFactory;

    public static function CrearVisita($Ip_client, $pagina)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearVisita    = DB::Insert(
            'INSERT IGNORE INTO visitas_pagina (FECHA,IP,PAGINA) VALUES (?,?,?)',
            [$fechaCreacion, $Ip_client, $pagina]
        );
        return $CrearVisita;
    }

    public static function ListarNotificaciones()
    {
        $ListarNotificaciones = DB::Select("SELECT * FROM notificaciones WHERE ESTADO = 1");
        return $ListarNotificaciones;
    }

    public static function GetVisitas()
    {
        $GetVisitas = DB::Select("SELECT COUNT(*) AS CONTADOR FROM visitas_pagina");
        return $GetVisitas;
    }

    public static function Contactenos($NombreUsuario, $Correo, $Mensaje)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $Contactenos = DB::Insert(
            'INSERT INTO form_contacto (NOMBRE_CIUDADANO,CORREO,MENSAJE,FECHA_CREACION) VALUES (?,?,?,?)',
            [$NombreUsuario, $Correo, $Mensaje, $fechaCreacion]
        );
        return $Contactenos;
    }

    public static function TipoDocumento()
    {
        $TipoDocumento = DB::Select("SELECT * FROM tipo_documento");
        return $TipoDocumento;
    }

    public static function TipoDocumentoId($id)
    {
        $TipoDocumento = DB::Select("SELECT NOMBRE_DOCUMENTO FROM tipo_documento WHERE ID_DOCUMENTO = $id");
        return $TipoDocumento;
    }

    public static function Trabajo($NombreUsuario, $Correo, $TipoDocumento, $Documento, $Direccion, $Telefono, $Profesion, $NombreFoto)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $Contactenos = DB::Insert(
            'INSERT INTO form_trabajo (NOMBRE_CIUDADANO,ID_DOCUMENTO,IDENTIFICACION,DIRECCION,CORREO,TELEFONO,PROFESION,DOCUMENTO,FECHA_CREACION)
                                VALUES (?,?,?,?,?,?,?,?,?)',
            [$NombreUsuario, $TipoDocumento, $Documento, $Direccion, $Correo, $Telefono, $Profesion, $NombreFoto, $fechaCreacion]
        );
        return $Contactenos;
    }

    public static function ListarDesfijacionActiva()
    {
        $ListarDesfijacionActiva = DB::Select("SELECT * FROM desfijaciones WHERE ESTADO = 1");
        return $ListarDesfijacionActiva;
    }

    public static function DocumentoPoliticaHSEQ(){
        $DocumentoPoliticaHSEQ = DB::Select("SELECT * FROM documentos WHERE ID_TYPE_DOCUMENT = 1 AND ESTADO = 1");
        return $DocumentoPoliticaHSEQ;
    }

    public static function DocumentoProteccionDatos(){
        $DocumentoProteccionDatos = DB::Select("SELECT * FROM documentos WHERE ID_TYPE_DOCUMENT = 3 AND ESTADO = 1");
        return $DocumentoProteccionDatos;
    }

    public static function ListarNormatividades(){
        $ListarNormatividades = DB::Select("SELECT * FROM documentos WHERE ID_TYPE_DOCUMENT = 2 AND ESTADO = 1");
        return $ListarNormatividades;
    }
}
