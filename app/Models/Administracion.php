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
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia  WHERE ESTADO = ? ORDER BY NOMBRE_DEPENDENCIA',[1]);
        return $ListarDepenencias;
    }

    public static function ListarDependenciasId($IdDependencia){
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia WHERE ID_DEPENDENCIA = ?',[$IdDependencia]);
        return $ListarDepenencias;
    }

    public static function BuscarDependenciaByUsername($NOMBRE){
        $BuscarDependenciaByUsername = DB::select("SELECT * FROM dependencia WHERE NOMBRE_DEPENDENCIA LIKE '%$NOMBRE%'");
        return $BuscarDependenciaByUsername;
    }

    public static function BuscarDependenciaByUsernameId($NOMBRE,$IdDependencia){
        $BuscarDependenciaByUsername = DB::select("SELECT * FROM dependencia WHERE NOMBRE_DEPENDENCIA LIKE '%$NOMBRE%' AND ID_DEPENDENCIA NOT IN ($IdDependencia)");
        return $BuscarDependenciaByUsername;
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
        $ListarRoles = DB::Select('SELECT * FROM roles  WHERE ESTADO = ? ORDER BY NOMBRE_ROL',[1]);
        return $ListarRoles;
    }

    public static function ListarRolesId($IdRol){
        $ListarRoles = DB::Select('SELECT * FROM roles WHERE ID_ROL = ?',[$IdRol]);
        return $ListarRoles;
    }

    public static function BuscarRolByUsername($NOMBRE){
        $BuscarRolByUsername = DB::select("SELECT * FROM roles WHERE NOMBRE_ROL LIKE '%$NOMBRE%'");
        return $BuscarRolByUsername;
    }

    public static function BuscarRolByUsernameiD($NOMBRE,$IdRol){
        $BuscarRolByUsername = DB::select("SELECT * FROM roles WHERE NOMBRE_ROL LIKE '%$NOMBRE%' AND ID_ROL NOT IN ($IdRol)");
        return $BuscarRolByUsername;
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

    public static function ListarUsuarios(){
        $ListarUsuarios = DB::Select('SELECT * FROM usuarios ORDER BY NOMBRE_USUARIO');
        return $ListarUsuarios;
    }

    public static function BuscarUserId($IdUsuario){
        $BuscarUserId = DB::select('SELECT * FROM usuarios WHERE ID_USUARIO = ?', [$IdUsuario]);
        return $BuscarUserId;
    }

    public static function BuscarUserByUsername($Username){
        $BuscarUserByUsername = DB::select("SELECT * FROM usuarios WHERE USERNAME LIKE '%$Username%'");
        return $BuscarUserByUsername;
    }

    public static function BuscarUserByUsernameId($Username,$IdUsuario){
        $BuscarUserByUsernameId = DB::select("SELECT * FROM usuarios WHERE USERNAME LIKE '%$Username%' AND ID_USUARIO NOT IN ($IdUsuario)");
        return $BuscarUserByUsernameId;
    }

    public static function CrearUsuario($Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$Usuario,$Administrador){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearUsuario = DB::Insert('INSERT INTO usuarios (NOMBRE_USUARIO,CORREO,USERNAME,PASSWORD,ID_ROL,ID_DEPENDENCIA,ESTADO,FECHA_CREACION,USUARIO_CREACION,ADMINISTRADOR)
                                    VALUES (?,?,?,?,?,?,?,?,?,?)',
                                    [$Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$fechaCreacion,$Usuario,$Administrador]);
        return $CrearUsuario;
    }

    public static function ActualizarUsuario($IdUsuario,$Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$Usuario,$Administrador){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarUsuario = DB::update('UPDATE usuarios SET
                                        NOMBRE_USUARIO = ?,
                                        CORREO = ?,
                                        USERNAME = ?,
                                        PASSWORD = ?,
                                        ID_ROL = ?,
                                        ID_DEPENDENCIA = ?,
                                        ESTADO = ?,
                                        FECHA_MODIFICACION = ?,
                                        USUARIO_MODIFICACION = ?,
                                        ADMINISTRADOR = ?
                                        WHERE ID_USUARIO = ?',
                                        [$Nombre,$Correo,$Username,$Password,$Rol,$Dependencia,$Estado,$fechaActualizacion,$Usuario,$Administrador,$IdUsuario]);
        return $ActualizarUsuario;
    }

    public static function BuscarUser($Usuario){
        $BuscarUser = DB::Select('SELECT * FROM usuarios WHERE USERNAME = ?', [$Usuario]);
        return $BuscarUser;
    }

    public static function BuscarPass($Usuario,$Password){
        $BuscarPass = DB::Select('SELECT * FROM usuarios WHERE USERNAME = ? AND PASSWORD = ?', [$Usuario,$Password]);
        return $BuscarPass;
    }

    public static function BuscarUserEmail($Correo){
        $BuscarUserEmail = DB::Select('SELECT * FROM usuarios WHERE CORREO = ?', [$Correo]);
        return $BuscarUserEmail;
    }

    public static function RestablecerPassword($UserName,$UserEmail){
        $RestablecerPassword = DB::Select('SELECT * FROM usuarios WHERE CORREO = ? AND USERNAME = ?', [$UserEmail,$UserName]);
        return $RestablecerPassword;
    }

    public static function NuevaContrasena($idUser,$nuevaContrasena){
        $NuevaContrasena = DB::Update('UPDATE usuarios SET PASSWORD = ? WHERE ID_USUARIO = ?', [$nuevaContrasena,$idUser]);
        return $NuevaContrasena;
    }

    public static function ListarNotificaciones(){
        $ListarNotificaciones = DB::Select('SELECT * FROM notificaciones ORDER BY NOMBRE_CIUDADANO');
        return $ListarNotificaciones;
    }

    public static function ListarNotificacionPlaca($Placa){
        $ListarNotificacionPlaca = DB::Select('SELECT * FROM notificaciones WHERE PLACA = ? AND ESTADO = 1',[$Placa]);
        return $ListarNotificacionPlaca;
    }

    public static function CargarNotificacion($NOMBRE_CIUDADANO,$PLACA,$YEAR_NOTIFICATION,$Estado,$IdUser){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));

        $CargarNotificacion = DB::Insert("INSERT INTO notificaciones (NOMBRE_CIUDADANO,PLACA,YEAR_NOTIFICATION,ESTADO,FECHA_CREACION,USUARIO_CREACION)
                                        VALUES ('$NOMBRE_CIUDADANO','$PLACA',$YEAR_NOTIFICATION,$Estado,'$fechaCreacion',$IdUser)");
        return $CargarNotificacion;
    }

    public static function InactivarNotificaciones(){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $fecha_sistema1  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema1));
        $InactivarNotificaciones = DB::Update("UPDATE notificaciones SET ESTADO = 2, FECHA_MODIFICACION = '$fechaActualizacion' WHERE FECHA_CREACION < '$fechaCreacion'");
        return $InactivarNotificaciones;
    }

    public static function ActualizarNotificacion($nombre_ciudadano,$placa,$year,$Estado,$IdUser,$IdNotificacion){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarNotificacion = DB::update('UPDATE notificaciones SET
                                            NOMBRE_CIUDADANO = ?,
                                            PLACA = ?,
                                            YEAR_NOTIFICATION = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_NOTIFICACION = ?',
                                            [$nombre_ciudadano,$placa,$year,$Estado,$fechaActualizacion ,$IdUser,$IdNotificacion]);;
        return $ActualizarNotificacion;
    }

    public static function ConsultarNotificaciones($fechaInicial,$fechaFinal){
        $fechaInicio    = date('Y-m-d', strtotime($fechaInicial));
        $fechaFin       = date('Y-m-d', strtotime($fechaFinal));
        if ($fechaInicio === $fechaFin) {
            $fecha = "WHERE FECHA_CREACION LIKE '%$fechaInicio%'";
        } else {
            $fecha = "WHERE FECHA_CREACION BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 23:59:59'";
        }
        $ConsultarNotificaciones = DB::Select("SELECT * FROM notificaciones $fecha ORDER BY FECHA_CREACION DESC");
        return $ConsultarNotificaciones;
    }

    public static function ListarDocumentos(){
        $ListarDocumentos = DB::select('SELECT * FROM documentos ORDER BY NOMBRE_DOCUMENTO');
        return $ListarDocumentos;
    }

    public static function BuscarDocumentoNombre($NombreDocumento){
        $BuscarDocumentoNombre = DB::select("SELECT * FROM documentos WHERE NOMBRE_DOCUMENTO LIKE '%$NombreDocumento%'");
        return $BuscarDocumentoNombre;
    }

    public static function BuscarDocumentoNombreId($NombreDocumento,$idDocumento){
        $BuscarDocumentoNombre = DB::select("SELECT * FROM documentos WHERE NOMBRE_DOCUMENTO LIKE '%$NombreDocumento%' AND ID_DOCUMENTO NOT IN ($idDocumento)");
        return $BuscarDocumentoNombre;
    }

    public static function CargarDocumento($NombreDocumento,$Ubicacion,$IdUser){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CargarDocumento = DB::Insert('INSERT INTO documentos
                                    (NOMBRE_DOCUMENTO,UBICACION,ESTADO,FECHA_CREACION,USUARIO_CREACION)
                                    VALUES (?,?,?,?,?)',
                                    [$NombreDocumento,$Ubicacion,1,$fechaCreacion,$IdUser]);
        return $CargarDocumento;
    }

    public static function ActualizarDocumento($IdDocumento,$NombreDocumento,$Ubicacion,$IdUser,$Estado){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        if($Ubicacion){
            $ActualizarDocumento = DB::update('UPDATE documentos SET
                                            NOMBRE_DOCUMENTO = ?,
                                            UBICACION = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_DOCUMENTO = ?',
                                            [$NombreDocumento,$Ubicacion,$Estado,$fechaActualizacion,$IdUser,$IdDocumento]);
        }else{
            $ActualizarDocumento = DB::update('UPDATE documentos SET
            NOMBRE_DOCUMENTO = ?,
            ESTADO = ?,
            FECHA_MODIFICACION = ?,
            USUARIO_MODIFICACION = ?
            WHERE ID_DOCUMENTO = ?',
            [$NombreDocumento,$Estado,$fechaActualizacion,$IdUser,$IdDocumento]);
        }
        return $ActualizarDocumento;
    }

    public static function BuscarUbicacion($IdDocumento){
        $BuscarUbicacion = DB::select('SELECT * FROM documentos WHERE ID_DOCUMENTO = ?',[$IdDocumento]);
        return $BuscarUbicacion;
    }

    public static function ConsultaContactenos($fechaInicial,$fechaFinal){
        $fechaInicio    = date('Y-m-d', strtotime($fechaInicial));
        $fechaFin       = date('Y-m-d', strtotime($fechaFinal));
        if ($fechaInicio === $fechaFin) {
            $fecha = "WHERE FECHA_CREACION LIKE '%$fechaInicio%'";
        } else {
            $fecha = "WHERE FECHA_CREACION BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 23:59:59'";
        }
        $ConsultaContactenos = DB::Select("SELECT * FROM form_contacto $fecha ORDER BY 2 DESC");
        return $ConsultaContactenos;
    }

    public static function ConsultaHojaVida($fechaInicial,$fechaFinal){
        $fechaInicio    = date('Y-m-d', strtotime($fechaInicial));
        $fechaFin       = date('Y-m-d', strtotime($fechaFinal));
        if ($fechaInicio === $fechaFin) {
            $fecha = "WHERE FECHA_CREACION LIKE '%$fechaInicio%'";
        } else {
            $fecha = "WHERE FECHA_CREACION BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 23:59:59'";
        }
        $ConsultaHojaVida = DB::Select("SELECT * FROM form_trabajo $fecha ORDER BY 2 DESC");
        return $ConsultaHojaVida;
    }

    public static function ConsultaVisitas($fechaInicial,$fechaFinal){
        $fechaInicio    = date('Y-m-d', strtotime($fechaInicial));
        $fechaFin       = date('Y-m-d', strtotime($fechaFinal));
        if ($fechaInicio === $fechaFin) {
            $fecha = "WHERE FECHA LIKE '%$fechaInicio%'";
        } else {
            $fecha = "WHERE FECHA BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 23:59:59'";
        }
        $ConsultaVisitas = DB::Select("SELECT * FROM visitas_pagina $fecha ORDER BY 4 DESC");
        return $ConsultaVisitas;
    }

    public static function ListadoPaginas(){
        $ListadoPaginas = DB::select('SELECT * FROM paginas ORDER BY NOMBRE_PAGINA');
        return $ListadoPaginas;
    }

    public static function ListadoSubpaginas(){
        $ListadoSubpaginas = DB::select('SELECT * FROM subpaginas ORDER BY NOMBRE_SUBPAGINA');
        return $ListadoSubpaginas;
    }

    public static function ListadoPaginasActivas(){
        $ListadoPaginasActivas = DB::select('SELECT * FROM paginas WHERE ESTADO = 1 ORDER BY 2');
        return $ListadoPaginasActivas;
    }

    public static function BuscarPageByName($Nombre){
        $BuscarUserByUsernameId = DB::select("SELECT * FROM paginas WHERE NOMBRE_PAGINA LIKE '%$Nombre%'");
        return $BuscarUserByUsernameId;
    }

    public static function BuscarPageByNameId($Nombre,$IdPagina){
        $BuscarUserByUsernameId = DB::select("SELECT * FROM paginas WHERE NOMBRE_PAGINA LIKE '%$Nombre%' AND ID_PAGINA NOT IN ($IdPagina)");
        return $BuscarUserByUsernameId;
    }

    public static function BuscarIdPagina($Page){
        $BuscarIdPagina = DB::select('SELECT * FROM paginas WHERE ID_PAGINA = ?',[$Page]);
        return $BuscarIdPagina;
    }

    public static function CrearPagina($NombrePagina,$Estado,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearPagina = DB::insert('INSERT INTO paginas (NOMBRE_PAGINA, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                    VALUES (?,?,?,?)',
                                    [$NombrePagina,$Estado,$fechaCreacion,$Usuario]);
        return $CrearPagina;
    }

    public static function ActualizarPagina($NombrePagina,$Estado,$idPagina,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarPagina = DB::update("UPDATE paginas SET NOMBRE_PAGINA = '$NombrePagina',
        ESTADO = $Estado, FECHA_MODIFICACION = '$fechaActualizacion', USUARIO_MODIFICACION = $Usuario
        WHERE ID_PAGINA = $idPagina");
        return $ActualizarPagina;
    }

    public static function BuscarSubPageByName($Nombre){
        $BuscarUserByUsernameId = DB::select("SELECT * FROM subpaginas WHERE NOMBRE_SUBPAGINA LIKE '%$Nombre%'");
        return $BuscarUserByUsernameId;
    }

    public static function BuscarSubPageById($IdSubpagina){
        $BuscarUserByUsernameId = DB::select("SELECT * FROM subpaginas WHERE ID_SUBPAGINA = $IdSubpagina");
        return $BuscarUserByUsernameId;
    }

    public static function BuscarSubPageByNameId($Nombre,$IdSubpagina){
        $BuscarUserByUsernameId = DB::select("SELECT * FROM subpaginas WHERE NOMBRE_SUBPAGINA LIKE '%$Nombre%' AND ID_SUBPAGINA NOT IN ($IdSubpagina)");
        return $BuscarUserByUsernameId;
    }

    public static function BuscarIdSubpagina($idPagina){
        $BuscarUserByUsernameId = DB::select("SELECT * FROM subpaginas WHERE ID_PAGINA = $idPagina");
        return $BuscarUserByUsernameId;
    }

    public static function CrearSubpagina($NombreSubpagina,$IdPagina,$Estado,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearSubpagina = DB::insert('INSERT INTO subpaginas (NOMBRE_SUBPAGINA, ID_PAGINA, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                    VALUES (?,?,?,?,?)',
                                    [$NombreSubpagina,$IdPagina,$Estado,$fechaCreacion,$Usuario]);
        return $CrearSubpagina;
    }

    public static function ActualizarSubpagina($NombrePagina,$Estado,$idPagina,$Usuario,$IdSubpagina){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarSubpagina = DB::update("UPDATE subpaginas SET NOMBRE_SUBPAGINA = '$NombrePagina', ID_PAGINA = $idPagina,
        ESTADO = $Estado, FECHA_MODIFICACION = '$fechaActualizacion', USUARIO_MODIFICACION = $Usuario
        WHERE ID_SUBPAGINA = $IdSubpagina");
        return $ActualizarSubpagina;
    }

    public static function ListadoImagenes(){
        $ListadoImagenes = DB::select("SELECT * FROM imagenes ORDER BY 2 ASC");
        return $ListadoImagenes;
    }

    public static function ListadoImagenesName($NombreImagen){
        $ListadoImagenesName = DB::select("SELECT * FROM imagenes WHERE NOMBRE_IMAGEN LIKE '%$NombreImagen%'");
        return $ListadoImagenesName;
    }

    public static function ListadoImagenesNameId($NombreImagen,$IdImagen){
        $ListadoImagenesNameId = DB::select("SELECT * FROM imagenes WHERE NOMBRE_IMAGEN LIKE '%$NombreImagen%' AND ID_IMAGEN NOT IN ($IdImagen)");
        return $ListadoImagenesNameId;
    }

    public static function ListadoImagenesId($IdImagen){
        $ListadoImagenesId = DB::select("SELECT * FROM imagenes WHERE ID_IMAGEN = $IdImagen");
        return $ListadoImagenesId;
    }

    public static function CrearImagen($Nombre,$carpeta,$IdPagina,$IdSubpagina,$IdUser){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearImagen = DB::insert('INSERT INTO imagenes (NOMBRE_IMAGEN,UBICACION,ID_PAGINA,ID_SUBPAGINA,ESTADO,FECHA_CREACION,USUARIO_CREACION)
                                    VALUES (?,?,?,?,?,?,?)',
                                    [$Nombre,$carpeta,$IdPagina,$IdSubpagina,1,$fechaCreacion,$IdUser]);
        return $CrearImagen;
    }

    public static function ActualizarImagen($Nombre,$path,$IdPagina,$IdSubpagina,$IdUser,$Estado,$IdImagen){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        if($path){
            $ActualizarImagen = DB::update('UPDATE imagenes SET
            NOMBRE_IMAGEN = ?,
            UBICACION = ?,
            ESTADO = ?,
            FECHA_MODIFICACION = ?,
            USUARIO_MODIFICACION = ?,
            ID_PAGINA = ?,
            ID_SUBPAGINA = ?
            WHERE ID_IMAGEN = ?',
            [$Nombre,$path,$Estado,$fechaActualizacion,$IdUser,$IdPagina,$IdSubpagina,$IdImagen]);
        }else{
            $ActualizarImagen = DB::update('UPDATE imagenes SET
            NOMBRE_IMAGEN = ?,
            ESTADO = ?,
            FECHA_MODIFICACION = ?,
            USUARIO_MODIFICACION = ?,
            ID_PAGINA = ?,
            ID_SUBPAGINA = ?
            WHERE ID_IMAGEN = ?',
            [$Nombre,$Estado,$fechaActualizacion,$IdUser,$IdPagina,$IdSubpagina,$IdImagen]);
        }
        return $ActualizarImagen;
    }
}
