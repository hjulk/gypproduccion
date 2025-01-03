<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Administracion extends Model
{
    use HasFactory;

    public static function getNotificacionesAviso()
    {
        $getNotificacionesAviso = DB::Select("SELECT * FROM notificaciones WHERE ESTADO = 1 ORDER BY 1 DESC LIMIT 10");
        return $getNotificacionesAviso;
    }

    public static function getContactenos()
    {
        $getContactenos = DB::Select("SELECT * FROM form_contacto ORDER BY 1 DESC LIMIT 10");
        return $getContactenos;
    }

    public static function getHojaVida()
    {
        $getHojaVida = DB::Select("SELECT * FROM form_trabajo ORDER BY 1 DESC LIMIT 10");
        return $getHojaVida;
    }

    public static function tipoDocumento($idDocumento)
    {
        $getHojaVida = DB::Select("SELECT * FROM tipo_documento WHERE ID_DOCUMENTO = $idDocumento AND ESTADO = 1");
        return $getHojaVida;
    }

    public static function ListarDepenencias()
    {
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia ORDER BY NOMBRE_DEPENDENCIA');
        return $ListarDepenencias;
    }

    public static function ListarDepenenciasActivo()
    {
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia  WHERE ESTADO = ? ORDER BY NOMBRE_DEPENDENCIA', [1]);
        return $ListarDepenencias;
    }

    public static function ListarDependenciasId($IdDependencia)
    {
        $ListarDepenencias = DB::Select('SELECT * FROM dependencia WHERE ID_DEPENDENCIA = ?', [$IdDependencia]);
        return $ListarDepenencias;
    }

    public static function BuscarDependenciaByUsername($NOMBRE)
    {
        $BuscarDependenciaByUsername = DB::select("SELECT * FROM dependencia WHERE NOMBRE_DEPENDENCIA LIKE '%$NOMBRE%'");
        return $BuscarDependenciaByUsername;
    }

    public static function BuscarDependenciaByUsernameId($NOMBRE, $IdDependencia)
    {
        $BuscarDependenciaByUsername = DB::select("SELECT * FROM dependencia WHERE NOMBRE_DEPENDENCIA LIKE '%$NOMBRE%' AND ID_DEPENDENCIA NOT IN ($IdDependencia)");
        return $BuscarDependenciaByUsername;
    }

    public static function CrearDependencia($Nombre, $Usuario)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearDependencia = DB::Insert(
            'INSERT INTO dependencia (NOMBRE_DEPENDENCIA, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        values (?,?,?,?)',
            [$Nombre, 1, $fechaCreacion, 1]
        );
        return $CrearDependencia;
    }

    public static function ActualizarDependencia($Nombre, $Usuario, $Estado, $IdDependencia)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarDependencia = DB::Update(
            'UPDATE dependencia SET
                                            NOMBRE_DEPENDENCIA = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_DEPENDENCIA = ?',
            [$Nombre, $Estado, $fechaActualizacion, $Usuario, $IdDependencia]
        );
        return $ActualizarDependencia;
    }

    public static function ListarRoles()
    {
        $ListarRoles = DB::Select('SELECT * FROM roles ORDER BY NOMBRE_ROL');
        return $ListarRoles;
    }

    public static function ListarRolesActivo()
    {
        $ListarRoles = DB::Select('SELECT * FROM roles  WHERE ESTADO = ? ORDER BY NOMBRE_ROL', [1]);
        return $ListarRoles;
    }

    public static function ListarRolesId($IdRol)
    {
        $ListarRoles = DB::Select('SELECT * FROM roles WHERE ID_ROL = ?', [$IdRol]);
        return $ListarRoles;
    }

    public static function BuscarRolByUsername($NOMBRE)
    {
        $BuscarRolByUsername = DB::select("SELECT * FROM roles WHERE NOMBRE_ROL LIKE '%$NOMBRE%'");
        return $BuscarRolByUsername;
    }

    public static function BuscarRolByUsernameiD($NOMBRE, $IdRol)
    {
        $BuscarRolByUsername = DB::select("SELECT * FROM roles WHERE NOMBRE_ROL LIKE '%$NOMBRE%' AND ID_ROL NOT IN ($IdRol)");
        return $BuscarRolByUsername;
    }

    public static function CrearRol($Nombre, $Usuario)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearRol = DB::Insert(
            'INSERT INTO roles (NOMBRE_ROL, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        values (?,?,?,?)',
            [$Nombre, 1, $fechaCreacion, 1]
        );
        return $CrearRol;
    }

    public static function ActualizarRol($Nombre, $Usuario, $Estado, $IdRol)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarRol = DB::Update(
            'UPDATE roles SET
                                            NOMBRE_ROL = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_ROL = ?',
            [$Nombre, $Estado, $fechaActualizacion, $Usuario, $IdRol]
        );
        return $ActualizarRol;
    }

    public static function ListarUsuarios()
    {
        $ListarUsuarios = DB::Select('SELECT * FROM usuarios ORDER BY NOMBRE_USUARIO');
        return $ListarUsuarios;
    }

    public static function BuscarUserId($IdUsuario)
    {
        $BuscarUserId = DB::select('SELECT * FROM usuarios WHERE ID_USUARIO = ?', [$IdUsuario]);
        return $BuscarUserId;
    }

    public static function BuscarUserByUsername($Username)
    {
        $BuscarUserByUsername = DB::select("SELECT * FROM usuarios WHERE USERNAME LIKE '%$Username%'");
        return $BuscarUserByUsername;
    }

    public static function BuscarUserByUsernameId($Username, $IdUsuario)
    {
        $BuscarUserByUsernameId = DB::select("SELECT * FROM usuarios WHERE USERNAME LIKE '%$Username%' AND ID_USUARIO NOT IN ($IdUsuario)");
        return $BuscarUserByUsernameId;
    }

    public static function CrearUsuario($Nombre, $Correo, $Username, $Password, $Rol, $Dependencia, $Estado, $Usuario, $Administrador)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearUsuario = DB::Insert(
            'INSERT INTO usuarios (NOMBRE_USUARIO,CORREO,USERNAME,PASSWORD,ID_ROL,ID_DEPENDENCIA,ESTADO,FECHA_CREACION,USUARIO_CREACION,ADMINISTRADOR)
                                    VALUES (?,?,?,?,?,?,?,?,?,?)',
            [$Nombre, $Correo, $Username, $Password, $Rol, $Dependencia, $Estado, $fechaCreacion, $Usuario, $Administrador]
        );
        return $CrearUsuario;
    }

    public static function ActualizarUsuario($IdUsuario, $Nombre, $Correo, $Username, $Password, $Rol, $Dependencia, $Estado, $Usuario, $Administrador)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarUsuario = DB::update(
            'UPDATE usuarios SET
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
            [$Nombre, $Correo, $Username, $Password, $Rol, $Dependencia, $Estado, $fechaActualizacion, $Usuario, $Administrador, $IdUsuario]
        );
        return $ActualizarUsuario;
    }

    public static function BuscarUser($Usuario)
    {
        $BuscarUser = DB::Select('SELECT * FROM usuarios WHERE USERNAME = ?', [$Usuario]);
        return $BuscarUser;
    }

    public static function BuscarPass($Usuario, $Password)
    {
        $BuscarPass = DB::Select('SELECT * FROM usuarios WHERE USERNAME = ? AND PASSWORD = ?', [$Usuario, $Password]);
        return $BuscarPass;
    }

    public static function BuscarUserEmail($Correo)
    {
        $BuscarUserEmail = DB::Select('SELECT * FROM usuarios WHERE CORREO = ?', [$Correo]);
        return $BuscarUserEmail;
    }

    public static function RestablecerPassword($UserName, $UserEmail)
    {
        $RestablecerPassword = DB::Select('SELECT * FROM usuarios WHERE CORREO = ? AND USERNAME = ?', [$UserEmail, $UserName]);
        return $RestablecerPassword;
    }

    public static function NuevaContrasena($idUser, $nuevaContrasena)
    {
        $NuevaContrasena = DB::Update('UPDATE usuarios SET PASSWORD = ? WHERE ID_USUARIO = ?', [$nuevaContrasena, $idUser]);
        return $NuevaContrasena;
    }

    public static function ListarNotificaciones()
    {
        $ListarNotificaciones = DB::Select('SELECT * FROM notificaciones ORDER BY NOMBRE_CIUDADANO');
        return $ListarNotificaciones;
    }

    public static function ListarNotificacionPlaca($Placa)
    {
        $ListarNotificacionPlaca = DB::Select('SELECT * FROM notificaciones WHERE PLACA = ? AND ESTADO = 1', [$Placa]);
        return $ListarNotificacionPlaca;
    }

    public static function CargarNotificacion($NOMBRE_CIUDADANO, $PLACA, $YEAR_NOTIFICATION, $Estado, $IdUser)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));

        $CargarNotificacion = DB::Insert("INSERT INTO notificaciones (NOMBRE_CIUDADANO,PLACA,YEAR_NOTIFICATION,ESTADO,FECHA_CREACION,USUARIO_CREACION)
                                        VALUES ('$NOMBRE_CIUDADANO','$PLACA',$YEAR_NOTIFICATION,$Estado,'$fechaCreacion',$IdUser)");
        return $CargarNotificacion;
    }

    public static function InactivarNotificaciones()
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $fecha_sistema1  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema1));
        $InactivarNotificaciones = DB::Update("UPDATE notificaciones SET ESTADO = 2, FECHA_MODIFICACION = '$fechaActualizacion' WHERE FECHA_CREACION < '$fechaCreacion'");
        return $InactivarNotificaciones;
    }

    public static function ActualizarNotificacion($nombre_ciudadano, $placa, $year, $Estado, $IdUser, $IdNotificacion)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarNotificacion = DB::update(
            'UPDATE notificaciones SET
                                            NOMBRE_CIUDADANO = ?,
                                            PLACA = ?,
                                            YEAR_NOTIFICATION = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_NOTIFICACION = ?',
            [$nombre_ciudadano, $placa, $year, $Estado, $fechaActualizacion, $IdUser, $IdNotificacion]
        );
        return $ActualizarNotificacion;
    }

    public static function ConsultarNotificaciones($fechaInicial, $fechaFinal)
    {
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

    public static function InactivarNotificacionesAll($IdUser)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarNotificacion = DB::update(
            'UPDATE notificaciones SET
                                            ESTADO = 2,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ESTADO = 1',
            [$fechaActualizacion, $IdUser]
        );
        return $ActualizarNotificacion;
    }

    public static function ListarDocumentos()
    {
        $ListarDocumentos = DB::select('SELECT * FROM documentos ORDER BY NOMBRE_DOCUMENTO');
        return $ListarDocumentos;
    }

    public static function BuscarDocumentoNombre($NombreDocumento)
    {
        $BuscarDocumentoNombre = DB::select("SELECT * FROM documentos WHERE NOMBRE_DOCUMENTO LIKE '%$NombreDocumento%'");
        return $BuscarDocumentoNombre;
    }

    public static function BuscarDocumentoNombreId($NombreDocumento, $idDocumento)
    {
        $BuscarDocumentoNombre = DB::select("SELECT * FROM documentos WHERE NOMBRE_DOCUMENTO = '$NombreDocumento' AND ID_DOCUMENTO NOT IN ($idDocumento)");
        return $BuscarDocumentoNombre;
    }

    public static function BuscarDocumentoNombreById($idDocumento,$idTipoDocumento)
    {
        $BuscarDocumentoNombre = DB::select("SELECT * FROM documentos WHERE ID_TYPE_DOCUMENT = $idTipoDocumento AND ID_DOCUMENTO NOT IN ($idDocumento) AND ESTADO = 1");
        return $BuscarDocumentoNombre;
    }

    public static function CargarDocumento($NombreDocumento, $Ubicacion, $TipoDocumento, $IdUser)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        DB::update('UPDATE documentos SET
                    ESTADO = ?,
                    FECHA_MODIFICACION = ?,
                    USUARIO_MODIFICACION = ?
                    WHERE ID_TYPE_DOCUMENT = ?
                    AND ID_TYPE_DOCUMENT NOT IN (2)',
                    [2,$fechaCreacion,$IdUser,$TipoDocumento]);
        $CargarDocumento = DB::Insert(
            'INSERT INTO documentos
            (NOMBRE_DOCUMENTO,ID_TYPE_DOCUMENT,UBICACION,ESTADO,FECHA_CREACION,USUARIO_CREACION)
            VALUES (?,?,?,?,?,?)',
            [$NombreDocumento, $TipoDocumento, $Ubicacion, 1, $fechaCreacion, $IdUser]
        );
        return $CargarDocumento;
    }

    public static function ActualizarDocumento($IdDocumento, $NombreDocumento, $Ubicacion, $TipoDocumento, $IdUser, $Estado)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));

        if ($Ubicacion) {
            $ActualizarDocumento = DB::update(
                'UPDATE documentos SET
                NOMBRE_DOCUMENTO = ?,
                ID_TYPE_DOCUMENT = ?,
                UBICACION = ?,
                ESTADO = ?,
                FECHA_MODIFICACION = ?,
                USUARIO_MODIFICACION = ?
                WHERE ID_DOCUMENTO = ?',
                [$NombreDocumento, $TipoDocumento, $Ubicacion, $Estado, $fechaActualizacion, $IdUser, $IdDocumento]
            );
        } else {
            $ActualizarDocumento = DB::update(
                'UPDATE documentos SET
            NOMBRE_DOCUMENTO = ?,
            ID_TYPE_DOCUMENT = ?,
            ESTADO = ?,
            FECHA_MODIFICACION = ?,
            USUARIO_MODIFICACION = ?
            WHERE ID_DOCUMENTO = ?',
                [$NombreDocumento, $TipoDocumento, $Estado, $fechaActualizacion, $IdUser, $IdDocumento]
            );
        }
        return $ActualizarDocumento;
    }

    public static function BuscarUbicacion($IdDocumento)
    {
        $BuscarUbicacion = DB::select('SELECT * FROM documentos WHERE ID_DOCUMENTO = ?', [$IdDocumento]);
        return $BuscarUbicacion;
    }

    public static function ConsultaContactenos($fechaInicial, $fechaFinal)
    {
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

    public static function ConsultaHojaVida($fechaInicial, $fechaFinal)
    {
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

    public static function ConsultaVisitas($fechaInicial, $fechaFinal)
    {
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

    public static function ListadoPaginas()
    {
        $ListadoPaginas = DB::select('SELECT * FROM paginas ORDER BY NOMBRE_PAGINA');
        return $ListadoPaginas;
    }

    public static function ListadoSubpaginas()
    {
        $ListadoSubpaginas = DB::select('SELECT * FROM subpaginas ORDER BY NOMBRE_SUBPAGINA');
        return $ListadoSubpaginas;
    }

    public static function ListadoPaginasActivas()
    {
        $ListadoPaginasActivas = DB::select('SELECT * FROM paginas WHERE ESTADO = 1 ORDER BY 2');
        return $ListadoPaginasActivas;
    }

    public static function BuscarPageByName($Nombre)
    {
        $BuscarUserByUsernameId = DB::select("SELECT * FROM paginas WHERE NOMBRE_PAGINA LIKE '%$Nombre%'");
        return $BuscarUserByUsernameId;
    }

    public static function BuscarPageByNameId($Nombre, $IdPagina)
    {
        $BuscarUserByUsernameId = DB::select("SELECT * FROM paginas WHERE NOMBRE_PAGINA LIKE '%$Nombre%' AND ID_PAGINA NOT IN ($IdPagina)");
        return $BuscarUserByUsernameId;
    }

    public static function BuscarIdPagina($Page)
    {
        $BuscarIdPagina = DB::select('SELECT * FROM paginas WHERE ID_PAGINA = ?', [$Page]);
        return $BuscarIdPagina;
    }

    public static function CrearPagina($NombrePagina, $Estado, $Usuario)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearPagina = DB::insert(
            'INSERT INTO paginas (NOMBRE_PAGINA, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                    VALUES (?,?,?,?)',
            [$NombrePagina, $Estado, $fechaCreacion, $Usuario]
        );
        return $CrearPagina;
    }

    public static function ActualizarPagina($NombrePagina, $Estado, $idPagina, $Usuario)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarPagina = DB::update("UPDATE paginas SET NOMBRE_PAGINA = '$NombrePagina',
        ESTADO = $Estado, FECHA_MODIFICACION = '$fechaActualizacion', USUARIO_MODIFICACION = $Usuario
        WHERE ID_PAGINA = $idPagina");
        return $ActualizarPagina;
    }

    public static function BuscarSubPageByName($Nombre)
    {
        $BuscarUserByUsernameId = DB::select("SELECT * FROM subpaginas WHERE NOMBRE_SUBPAGINA LIKE '%$Nombre%'");
        return $BuscarUserByUsernameId;
    }

    public static function BuscarSubPageById($IdSubpagina)
    {
        $BuscarUserByUsernameId = DB::select("SELECT * FROM subpaginas WHERE ID_SUBPAGINA = $IdSubpagina");
        return $BuscarUserByUsernameId;
    }

    public static function BuscarSubPageByNameId($Nombre, $IdSubpagina)
    {
        $BuscarUserByUsernameId = DB::select("SELECT * FROM subpaginas WHERE NOMBRE_SUBPAGINA LIKE '%$Nombre%' AND ID_SUBPAGINA NOT IN ($IdSubpagina)");
        return $BuscarUserByUsernameId;
    }

    public static function BuscarIdSubpagina($idPagina)
    {
        $BuscarUserByUsernameId = DB::select("SELECT * FROM subpaginas WHERE ID_PAGINA = $idPagina AND ESTADO = 1 ORDER BY 2 ASC");
        return $BuscarUserByUsernameId;
    }

    public static function CrearSubpagina($NombreSubpagina, $IdPagina, $Estado, $Usuario)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearSubpagina = DB::insert(
            'INSERT INTO subpaginas (NOMBRE_SUBPAGINA, ID_PAGINA, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                    VALUES (?,?,?,?,?)',
            [$NombreSubpagina, $IdPagina, $Estado, $fechaCreacion, $Usuario]
        );
        return $CrearSubpagina;
    }

    public static function ActualizarSubpagina($NombrePagina, $Estado, $idPagina, $Usuario, $IdSubpagina)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarSubpagina = DB::update("UPDATE subpaginas SET NOMBRE_SUBPAGINA = '$NombrePagina', ID_PAGINA = $idPagina,
        ESTADO = $Estado, FECHA_MODIFICACION = '$fechaActualizacion', USUARIO_MODIFICACION = $Usuario
        WHERE ID_SUBPAGINA = $IdSubpagina");
        return $ActualizarSubpagina;
    }

    public static function ListadoImagenes()
    {
        $ListadoImagenes = DB::select("SELECT * FROM imagenes ORDER BY 2 ASC");
        return $ListadoImagenes;
    }

    public static function ListadoImagenesName($NombreImagen)
    {
        $ListadoImagenesName = DB::select("SELECT * FROM imagenes WHERE NOMBRE_IMAGEN LIKE '%$NombreImagen%'");
        return $ListadoImagenesName;
    }

    public static function ListadoImagenesNameId($NombreImagen, $IdImagen)
    {
        $ListadoImagenesNameId = DB::select("SELECT * FROM imagenes WHERE NOMBRE_IMAGEN LIKE '%$NombreImagen%' AND ID_IMAGEN NOT IN ($IdImagen)");
        return $ListadoImagenesNameId;
    }

    public static function ListadoImagenesId($IdImagen)
    {
        $ListadoImagenesId = DB::select("SELECT * FROM imagenes WHERE ID_IMAGEN = $IdImagen");
        return $ListadoImagenesId;
    }

    public static function CrearImagen($Nombre, $carpeta, $path1,$IdPagina, $IdSubpagina, $IdUser, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        if($FinAno === 1){
            $EndYear = date('Y') + 1;
        }else{
            $EndYear = null;
        }
        if($TextoImagen){
            $CrearImagen = DB::insert(
                'INSERT INTO imagenes (NOMBRE_IMAGEN,UBICACION,UBICACION_WEBP,ID_PAGINA,ID_SUBPAGINA,ESTADO,
                FECHA_CREACION,USUARIO_CREACION,TEXTO_IMAGEN,ORDEN_IMAGEN,PIE_IMAGEN,ID_GRUA,FIN_ANO,END_YEAR)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
                [$Nombre, $path1, $carpeta, $IdPagina, $IdSubpagina, 1, $fechaCreacion, $IdUser, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno, $EndYear]
            );
        }else{
            $CrearImagen = DB::insert(
                'INSERT INTO imagenes (NOMBRE_IMAGEN,UBICACION,UBICACION_WEBP,ID_PAGINA,ID_SUBPAGINA,ESTADO,
                FECHA_CREACION,USUARIO_CREACION,ORDEN_IMAGEN,PIE_IMAGEN,ID_GRUA,FIN_ANO,END_YEAR)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)',
                [$Nombre, $path1, $carpeta, $IdPagina, $IdSubpagina, 1, $fechaCreacion, $IdUser, $OrdenImagen, $pieImagen, $IdGrua, $FinAno, $EndYear]
            );
        }
        return $CrearImagen;
    }

    public static function ActualizarImagen($Nombre, $path, $path1, $IdPagina, $IdSubpagina, $IdUser, $Estado, $IdImagen, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        if($FinAno === 1){
            $EndYear = date('Y') + 1;
        }else{
            $EndYear = null;
        }
        if ($path) {
            $ActualizarImagen = DB::update(
                'UPDATE imagenes SET
            NOMBRE_IMAGEN = ?,
            UBICACION = ?,
            UBICACION_WEBP = ?,
            ESTADO = ?,
            FECHA_MODIFICACION = ?,
            USUARIO_MODIFICACION = ?,
            ID_PAGINA = ?,
            ID_SUBPAGINA = ?,
            TEXTO_IMAGEN = ?,
            ORDEN_IMAGEN = ?,
            PIE_IMAGEN = ?,
            ID_GRUA = ?,
            FIN_ANO = ?,
            END_YEAR = ?
            WHERE ID_IMAGEN = ?',
                [$Nombre, $path, $path1, $Estado, $fechaActualizacion, $IdUser, $IdPagina, $IdSubpagina, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno, $EndYear, $IdImagen]
            );
        } else {
            $ActualizarImagen = DB::update(
                'UPDATE imagenes SET
            NOMBRE_IMAGEN = ?,
            ESTADO = ?,
            FECHA_MODIFICACION = ?,
            USUARIO_MODIFICACION = ?,
            ID_PAGINA = ?,
            ID_SUBPAGINA = ?,
            TEXTO_IMAGEN = ?,
            ORDEN_IMAGEN = ?,
            PIE_IMAGEN = ?,
            ID_GRUA = ?,
            FIN_ANO = ?,
            END_YEAR = ?
            WHERE ID_IMAGEN = ?',
                [$Nombre, $Estado, $fechaActualizacion, $IdUser, $IdPagina, $IdSubpagina, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua,  $FinAno, $EndYear, $IdImagen]
            );
        }
        return $ActualizarImagen;
    }

    public static function ListarDesfijaciones()
    {
        $ListarDesfijaciones = DB::Select('SELECT * FROM desfijaciones ORDER BY ID_DESFIJACION');
        return $ListarDesfijaciones;
    }

    public static function CrearDesfijacion($Contenido, $IdUser)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $contenido = DB::Select('SELECT * FROM desfijaciones ORDER BY ID_DESFIJACION');
        if (count($contenido) > 0) {
            DB::Update("UPDATE desfijaciones SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE ESTADO = 1");
        }
        $CrearImagen = DB::insert(
            'INSERT INTO desfijaciones (CONTENIDO,ESTADO,FECHA_CREACION,USUARIO_CREACION)
                                    VALUES (?,?,?,?)',
            [$Contenido, 1, $fechaCreacion, $IdUser]
        );
        return $CrearImagen;
    }

    public static function ActualizarDesfijacion($Contenido, $Estado, $IdUser, $IdDesfijacion)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $ActualizarDesfijacion = DB::update(
            'UPDATE desfijaciones SET
                                            CONTENIDO = ?,
                                            ESTADO = ?,
                                            FECHA_MODIFICACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE ID_DESFIJACION = ?',
            [$Contenido, $Estado, $fechaCreacion, $IdUser, $IdDesfijacion]
        );
        return $ActualizarDesfijacion;
    }

    public static function ConsultarDesfijaciones($fechaInicial, $fechaFinal)
    {
        $fechaInicio    = date('Y-m-d', strtotime($fechaInicial));
        $fechaFin       = date('Y-m-d', strtotime($fechaFinal));
        if ($fechaInicio === $fechaFin) {
            $fecha = "WHERE FECHA_CREACION LIKE '%$fechaInicio%'";
        } else {
            $fecha = "WHERE FECHA_CREACION BETWEEN '$fechaInicio 00:00:00' AND '$fechaFin 23:59:59'";
        }
        $ConsultaVisitas = DB::Select("SELECT * FROM desfijaciones $fecha ORDER BY 1 DESC");
        return $ConsultaVisitas;
    }

    public static function ListadoTipoDocumentos(){
        $ListadoTipoDocumentos = DB::Select('SELECT * FROM documents_type ORDER BY NOMBRE_DOCUMENTO');
        return $ListadoTipoDocumentos;
    }

    public static function ListadoTipoDocumentosActivos(){
        $ListadoTipoDocumentos = DB::Select('SELECT * FROM documents_type WHERE ESTADO = 1 ORDER BY NOMBRE_DOCUMENTO');
        return $ListadoTipoDocumentos;
    }

    public static function ListadoTipoDocumentosActivosById($IdDocumento){
        $ListadoTipoDocumentosActivosById = DB::Select("SELECT * FROM documents_type WHERE ESTADO = 1 AND ID_TYPE_DOCUMENT = $IdDocumento");
        return $ListadoTipoDocumentosActivosById;
    }

    public static function CrearDocumentType($NombreDocumento,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearDocumentType = DB::insert('INSERT INTO documents_type (NOMBRE_DOCUMENTO, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        VALUES (?,?,?,?)',
                                        [$NombreDocumento,1,$fechaCreacion,$Usuario]);
        return $CrearDocumentType;
    }

    public static function BuscarDocumentTypeName($NombreDocumento){
        $ListadoTipoDocumentos = DB::Select("SELECT * FROM documents_type WHERE NOMBRE_DOCUMENTO = '$NombreDocumento'");
        return $ListadoTipoDocumentos;
    }

    public static function BuscarDocumentTypeNameId($NombreDocumento,$IdDocumento){
        $ListadoTipoDocumentos = DB::Select("SELECT * FROM documents_type
        WHERE NOMBRE_DOCUMENTO = '$NombreDocumento'
        AND ID_TYPE_DOCUMENT NOT IN ($IdDocumento)");
        return $ListadoTipoDocumentos;
    }

    public static function ActualizarDocumentType($NombreDocumento,$Estado,$Usuario,$IdDocumento)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $ActualizarDocumentType = DB::update(
            'UPDATE documents_type SET
            NOMBRE_DOCUMENTO = ?,
            ESTADO = ?,
            FECHA_MODIFICACION = ?,
            USUARIO_MODIFICACION = ?
            WHERE ID_TYPE_DOCUMENT = ?',
            [$NombreDocumento, $Estado, $fechaCreacion, $Usuario, $IdDocumento]
        );
        return $ActualizarDocumentType;
    }

    public static function ListarOrdenImagenes(){
        $ListarOrdenImagenes = DB::select('SELECT * FROM orden_imagenes WHERE ESTADO = ?', [1]);
        return $ListarOrdenImagenes;
    }

    public static function ListarOrdenSubpagina($OrdenImagen,$IdSubpagina){
        $ListarOrdenSubpagina = DB::select('SELECT * FROM imagenes WHERE ORDEN_IMAGEN = ? AND ID_SUBPAGINA = ? AND ESTADO = 1',
                                [$OrdenImagen,$IdSubpagina]);
        return $ListarOrdenSubpagina;
    }

    public static function ListarOrdenPagina($OrdenImagen,$IdPagina,$OrdenFinAno){
        if($OrdenFinAno === 1){
            $ListarOrdenPagina = DB::select('SELECT * FROM imagenes WHERE ORDEN_IMAGEN = ? AND ID_PAGINA = ? AND FIN_ANO = ? AND ESTADO = 1 AND ID_SUBPAGINA = 0',
                                [$OrdenImagen,$IdPagina,$OrdenFinAno]);
            return $ListarOrdenPagina;
        }else{
            $ListarOrdenPagina = DB::select('SELECT * FROM imagenes WHERE ORDEN_IMAGEN = ? AND ID_PAGINA = ? AND ESTADO = 1 AND ID_SUBPAGINA = 0',
                                    [$OrdenImagen,$IdPagina]);
            return $ListarOrdenPagina;
        }
    }

    public static function ListarOrdenSubpaginaId($OrdenImagen,$IdPagina,$IdSubpagina,$IdImagen,$OrdenFinAno){
        if($OrdenFinAno === 1){
            $ListarOrdenSubpagina = DB::select('SELECT * FROM imagenes
            WHERE ORDEN_IMAGEN = ?
            AND ID_PAGINA = ?
            AND ID_SUBPAGINA = ?
            AND FIN_ANO = ?
            AND ESTADO = 1
            AND ID_IMAGEN NOT IN (?)',
            [$OrdenImagen,$IdPagina,$IdSubpagina,$OrdenFinAno,$IdImagen]);
            return $ListarOrdenSubpagina;
        }else{
            $ListarOrdenSubpagina = DB::select('SELECT * FROM imagenes
                                    WHERE ORDEN_IMAGEN = ?
                                    AND ID_PAGINA = ?
                                    AND ID_SUBPAGINA = ?
                                    AND ESTADO = 1
                                    AND ID_IMAGEN NOT IN (?)',
                                    [$OrdenImagen,$IdPagina,$IdSubpagina,$IdImagen]);
            return $ListarOrdenSubpagina;
        }
    }

    public static function ListadoTipoGruas(){
        $ListadoTipoGruas = DB::Select('SELECT * FROM tipo_grua ORDER BY NOMBRE_GRUA');
        return $ListadoTipoGruas;
    }

    public static function ListadoTipoGruasActivos(){
        $ListadoTipoGruas = DB::Select('SELECT * FROM tipo_grua WHERE ESTADO = 1 ORDER BY NOMBRE_GRUA');
        return $ListadoTipoGruas;
    }

    public static function ListadoTipoGruasActivosById($IdGrua){
        $ListadoTipoGruasActivosById = DB::Select("SELECT * FROM tipo_grua WHERE ESTADO = 1 AND ID_GRUA = $IdGrua");
        return $ListadoTipoGruasActivosById;
    }

    public static function CrearGrua($NombreGrua,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearGrua = DB::insert('INSERT INTO tipo_grua (NOMBRE_GRUA, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        VALUES (?,?,?,?)',
                                        [$NombreGrua,1,$fechaCreacion,$Usuario]);
        return $CrearGrua;
    }

    public static function BuscarGruaName($NombreGrua){
        $ListadoTipoGruas = DB::Select("SELECT * FROM tipo_grua WHERE NOMBRE_GRUA = '$NombreGrua'");
        return $ListadoTipoGruas;
    }

    public static function BuscarGruaNameId($NombreGrua,$IdGrua){
        $ListadoTipoGruas = DB::Select("SELECT * FROM tipo_grua
        WHERE NOMBRE_GRUA = '$NombreGrua'
        AND ID_GRUA NOT IN ($IdGrua)");
        return $ListadoTipoGruas;
    }

    public static function ActualizarGrua($NombreGrua,$Estado,$Usuario,$IdGrua)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $ActualizarGrua = DB::update(
            'UPDATE tipo_grua SET
            NOMBRE_GRUA = ?,
            ESTADO = ?,
            FECHA_MODIFICACION = ?,
            USUARIO_MODIFICACION = ?
            WHERE ID_GRUA = ?',
            [$NombreGrua, $Estado, $fechaCreacion, $Usuario, $IdGrua]
        );
        return $ActualizarGrua;
    }

    public static function ListarImagenGrua($IdGrua){
        $ListarImagenGrua = DB::select('SELECT * FROM imagenes WHERE ID_GRUA = ? AND ESTADO = 1', [$IdGrua]);
        return $ListarImagenGrua;
    }

    public static function ListarGruaById($IdGrua){
        $ListarGruaById = DB::select('SELECT * FROM tipo_grua WHERE ID_GRUA = ?', [$IdGrua]);
        return $ListarGruaById;
    }

    public static function ListadoImagenesOrganigrama(){
        $ListadoImagenesOrganigrama = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 2 AND ID_SUBPAGINA = 5 AND ESTADO = 1');
        return $ListadoImagenesOrganigrama;
    }

    public static function ListadoImagenesInicio(){
        $ListadoImagenesInicio = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 1 AND ID_SUBPAGINA = 0 AND FIN_ANO = NULL AND ESTADO = 1');
        return $ListadoImagenesInicio;
    }

    public static function ListadoImagenesFinAno(){
        $ListadoImagenesFinAno = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 1 AND ID_SUBPAGINA = 0 AND FIN_ANO = 1 AND ESTADO = 1');
        return $ListadoImagenesFinAno;
    }

    public static function ListadoImagenesRetiro(){
        $ListadoImagenesRetiro = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 4 AND ID_SUBPAGINA = 12 AND ESTADO = 1');
        return $ListadoImagenesRetiro;
    }

    public static function ListadoImagenesTarifa(){
        $ListadoImagenesTarifa = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 4 AND ID_SUBPAGINA = 13 AND ESTADO = 1');
        return $ListadoImagenesTarifa;
    }

    public static function ListadoImagenesNServicios(){
        $ListadoImagenesNServicios = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 4 AND ID_SUBPAGINA = 16 AND ESTADO = 1');
        return $ListadoImagenesNServicios;
    }

    public static function ListadoImagenesMonitoreo(){
        $ListadoImagenesMonitoreo = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 4 AND ID_SUBPAGINA = 10 AND ESTADO = 1');
        return $ListadoImagenesMonitoreo;
    }

    public static function ListadoImagenesMensaje(){
        $ListadoImagenesMonitoreo = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 4 AND ID_SUBPAGINA = 9 AND ESTADO = 1');
        return $ListadoImagenesMonitoreo;
    }

    public static function ListadoImagenesPago(){
        $ListadoImagenesPago = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 5 AND ID_SUBPAGINA = 15 AND ESTADO = 1');
        return $ListadoImagenesPago;
    }

    public static function ListadoImagenesRetiroId($IdImagen){
        $ListadoImagenesRetiro = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 4 AND ID_SUBPAGINA = 12 AND ESTADO = 1 AND ID_IMAGEN NOT IN (?)',[$IdImagen]);
        return $ListadoImagenesRetiro;
    }

    public static function ListadoImagenesTarifaId($IdImagen){
        $ListadoImagenesTarifa = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 4 AND ID_SUBPAGINA = 13 AND ESTADO = 1 AND ID_IMAGEN NOT IN (?)',[$IdImagen]);
        return $ListadoImagenesTarifa;
    }

    public static function ListadoImagenesPagoId($IdImagen){
        $ListadoImagenesPago = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 5 AND ID_SUBPAGINA = 15 AND ESTADO = 1 AND ID_IMAGEN NOT IN (?)',[$IdImagen]);
        return $ListadoImagenesPago;
    }

    public static function ListadoImagenesNServiciosId($IdImagen){
        $ListadoImagenesNServiciosId = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 4 AND ID_SUBPAGINA = 16 AND ESTADO = 1 AND ID_IMAGEN NOT IN (?)',[$IdImagen]);
        return $ListadoImagenesNServiciosId;
    }

    public static function ListadoImagenesMonitoreoId($IdImagen){
        $ListadoImagenesMonitoreoId = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 4 AND ID_SUBPAGINA = 10 AND ESTADO = 1 AND ID_IMAGEN NOT IN (?)',[$IdImagen]);
        return $ListadoImagenesMonitoreoId;
    }

    public static function ListadoImagenesOrganigramaId($IdImagen){
        $ListadoImagenesOrganigramaId = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 2 AND ID_SUBPAGINA = 5 AND ESTADO = 1 AND ID_IMAGEN NOT IN (?)',[$IdImagen]);
        return $ListadoImagenesOrganigramaId;
    }

    public static function ListadoImagenesInicioId($IdImagen){
        $ListadoImagenesInicioId = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 1 AND ID_SUBPAGINA = 0 AND ESTADO = 1 AND FIN_ANO = NULL AND ID_IMAGEN NOT IN (?)',[$IdImagen]);
        return $ListadoImagenesInicioId;
    }

    public static function ListadoImagenesInicioFinAnoId($IdImagen){
        $ListadoImagenesInicioId = DB::select('SELECT * FROM imagenes WHERE ID_PAGINA = 1 AND ID_SUBPAGINA = 0 AND ESTADO = 1 AND FIN_ANO = 1 AND ID_IMAGEN NOT IN (?)',[$IdImagen]);
        return $ListadoImagenesInicioId;
    }

    public static function ListadoImagenesGruaId($OrdenImagen,$IdGrua,$IdImagen){
        $ListadoImagenesGruaId = DB::select('SELECT * FROM imagenes
                                            WHERE ID_PAGINA = 4
                                            AND ID_SUBPAGINA = 8
                                            AND ESTADO = 1
                                            AND ORDEN_IMAGEN = ?
                                            AND ID_GRUA = ?
                                            AND ID_IMAGEN NOT IN (?)',[$OrdenImagen,$IdGrua,$IdImagen]);
        return $ListadoImagenesGruaId;
    }

    public static function BuscarDesfijacionActiva($IdDesfijacion){
        $BuscarDesfijacionActiva = DB::select('SELECT * FROM desfijaciones WHERE ESTADO = 1 AND ID_DESFIJACION NOT IN (?)',[$IdDesfijacion]);
        return $BuscarDesfijacionActiva;
    }

    public static function PreguntasFrecuentes(){
        $PreguntasFrecuentes = DB::Select("SELECT * FROM preguntas_frecuentes");
        return $PreguntasFrecuentes;
    }

    public static function ConsultaTituloPregunta($tituloPregunta){
        $ConsultaTituloPregunta = DB::Select("SELECT * FROM preguntas_frecuentes WHERE TITULO_PREGUNTA = '$tituloPregunta' AND ESTADO = 1");
        return $ConsultaTituloPregunta;
    }

    public static function ConsultaTituloPreguntaId($tituloPregunta, $idPregunta){
        $ConsultaTituloPreguntaId = DB::Select("SELECT * FROM preguntas_frecuentes WHERE TITULO_PREGUNTA LIKE '$tituloPregunta' AND ESTADO = 1 AND ID_PREGUNTA NOT IN ($idPregunta)");
        return $ConsultaTituloPreguntaId;
    }

    public static function CrearPregunta($tituloPregunta, $contenido, $IdUser){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearPregunta = DB::insert('INSERT INTO preguntas_frecuentes (TITULO_PREGUNTA, CONTENIDO, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        VALUES (?,?,?,?,?)',
                                        [$tituloPregunta,$contenido,1,$fechaCreacion,$IdUser]);
        return $CrearPregunta;
    }

    public static function ActualizarPregunta($idPregunta, $tituloPregunta, $contenido, $estado, $IdUser){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $ActualizarPagina = DB::Update('UPDATE preguntas_frecuentes SET
                                        TITULO_PREGUNTA = ?,
                                        CONTENIDO = ?,
                                        ESTADO = ?,
                                        FECHA_MODIFICACION = ?,
                                        USUARIO_MODIFICACION = ?
                                        WHERE ID_PREGUNTA = ?',
                                        [$tituloPregunta, $contenido, $estado, $fechaCreacion, $IdUser, $idPregunta]);
        return $ActualizarPagina;
    }

    public static function ListadoTipoTarifas(){
        $ListadoTipoTarifas = DB::Select("SELECT * FROM tipo_tarifa ORDER BY NOMBRE_TIPO");
        return $ListadoTipoTarifas;
    }

    public static function ListadoTipoTarifasActivo(){
        $ListadoTipoTarifas = DB::Select("SELECT * FROM tipo_tarifa WHERE ESTADO = 1 ORDER BY NOMBRE_TIPO");
        return $ListadoTipoTarifas;
    }

    public static function BuscarTipoTarifaName($NombreTarifa){
        $ListadoTipoTarifas = DB::Select("SELECT * FROM tipo_tarifa WHERE NOMBRE_TIPO = '$NombreTarifa'");
        return $ListadoTipoTarifas;
    }    

    public static function CrearTipoTarifa($NombreTarifa,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearTarifa = DB::insert('INSERT INTO tipo_tarifa (NOMBRE_TIPO, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        VALUES (?,?,?,?)',
                                        [$NombreTarifa,1,$fechaCreacion,$Usuario]);
        return $CrearTarifa;
    }
    
    public static function BuscarTipoTarifaNameId($NombreTarifa,$IdTarifa){
        $ListadoTipoTarifas = DB::Select("SELECT * FROM tipo_tarifa
        WHERE NOMBRE_TIPO = '$NombreTarifa'
        AND ID_TIPO NOT IN ($IdTarifa)");
        return $ListadoTipoTarifas;
    }

    public static function ActualizarTipoTarifa($NombreTarifa,$Estado,$Usuario,$IdTarifa)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $ActualizarTarifa = DB::update(
            'UPDATE tipo_tarifa SET
            NOMBRE_TIPO = ?,
            ESTADO = ?,
            FECHA_ACTUALIZACION = ?,
            USUARIO_ACTUALIZACION = ?
            WHERE ID_TIPO = ?',
            [$NombreTarifa, $Estado, $fechaCreacion, $Usuario, $IdTarifa]
        );
        return $ActualizarTarifa;
    }

    public static function ListadoNombreTarifas(){
        $ListadoNombreTarifas = DB::Select("SELECT * FROM nombre_tarifas ORDER BY NOMBRE_TARIFA, TIPO_TARIFA");
        return $ListadoNombreTarifas;
    }

    public static function ListadoNombreTarifasActivo(){
        $ListadoNombreTarifas = DB::Select("SELECT * FROM nombre_tarifas WHERE ESTADO = 1 ORDER BY NOMBRE_TARIFA");
        return $ListadoNombreTarifas;
    }

    public static function BuscarNombreTarifaName($NombreTarifa,$TipoTarifa){
        $ListadoNombreTarifas = DB::Select("SELECT * FROM nombre_tarifas WHERE NOMBRE_TARIFA = '$NombreTarifa' AND TIPO_TARIFA = $TipoTarifa");
        return $ListadoNombreTarifas;
    }    

    public static function CrearNombreTarifa($NombreTarifa,$TipoTarifa,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $CrearTarifa = DB::insert('INSERT INTO nombre_tarifas (NOMBRE_TARIFA, TIPO_TARIFA, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                   VALUES (?,?,?,?,?)',
                                        [$NombreTarifa,$TipoTarifa,1,$fechaCreacion,$Usuario]);
        return $CrearTarifa;
    }

    public static function BuscarTipoTarifaId($IdTarifa){
        $ListadoTipoTarifas = DB::Select("SELECT * FROM tipo_tarifa WHERE ID_TIPO = $IdTarifa");
        return $ListadoTipoTarifas;
    }
    
    public static function BuscarNombreTarifaNameId($NombreTarifa,$TipoTarifa,$IdTarifa){
        $ListadoNombreTarifas = DB::Select("SELECT * FROM nombre_tarifas
        WHERE NOMBRE_TARIFA = '$NombreTarifa'
        AND TIPO_TARIFA = $TipoTarifa
        AND ID_TARIFA NOT IN ($IdTarifa)");
        return $ListadoNombreTarifas;
    }

    public static function ActualizarNombreTarifa($NombreTarifa,$TipoTarifa,$Estado,$Usuario,$IdTarifa)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $ActualizarTarifa = DB::update(
            'UPDATE nombre_tarifas SET
            NOMBRE_TARIFA = ?,
            TIPO_TARIFA = ?,
            ESTADO = ?,
            FECHA_ACTUALIZACION = ?,
            USUARIO_ACTUALIZACION = ?
            WHERE ID_TARIFA = ?',
            [$NombreTarifa, $TipoTarifa, $Estado, $fechaCreacion, $Usuario, $IdTarifa]
        );
        return $ActualizarTarifa;
    }

    public static function OrdenTarifaPage($tipoTarifa,$year){
        $OrdenTarifaPage = DB::Select("SELECT * FROM tarifas WHERE TIPO_TARIFA = $tipoTarifa AND ESTADO = 1 and YEAR = $year");
        return $OrdenTarifaPage;
    }

    public static function ListadoTipoTarifa($tipoTarifa){
        $ListadoTipoTarifa = DB::Select("SELECT * FROM nombre_tarifas WHERE TIPO_TARIFA = $tipoTarifa AND ESTADO = 1 ORDER BY NOMBRE_TARIFA");
        return $ListadoTipoTarifa;
    }

    public static function ListTipoTarifa($tipoTarifa){
        $ListadoTipoTarifa = DB::Select("SELECT * FROM tarifas WHERE TIPO_TARIFA = $tipoTarifa");
        return $ListadoTipoTarifa;
    }

    public static function BuscarNombreTarifa($tarifa){
        $ListadoTipoTarifa = DB::Select("SELECT * FROM nombre_tarifas WHERE ID_TARIFA = $tarifa");
        return $ListadoTipoTarifa;
    }

    public static function ConsultaTarifa($tipoVehiculo, $tipoTarifa, $year){
        $ConsultaTarifa = DB::Select("SELECT * FROM tarifas WHERE TARIFA = $tipoVehiculo AND TIPO_TARIFA = $tipoTarifa AND YEAR = $year AND ESTADO = 1");
        return $ConsultaTarifa;
    }

    public static function CrearTarifa($tipoVehiculo, $tipoTarifa, $valor1, $valor2, $valor3, $valor4, $valor5, $vaorUnico, $Usuario, $yearTarifa){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $year = $yearTarifa;
        DB::Update("UPDATE tarifas SET ESTADO = 2, FECHA_ACTUALIZACION = '$fechaCreacion', USUARIO_MODIFICACION = $Usuario WHERE TARIFA = $tipoVehiculo AND YEAR < $year AND TIPO_TARIFA = $tipoTarifa AND ESTADO = 1");
        switch($tipoTarifa){
            case 1: $CrearTarifa = DB::Insert('INSERT INTO tarifas (TARIFA, TIPO_TARIFA, VALOR_TARIFA_1, VALOR_TARIFA_2, VALOR_TARIFA_3, VALOR_TARIFA_4, VALOR_TARIFA_5, YEAR, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                                VALUES (?,?,?,?,?,?,?,?,?,?,?)',
                                                [$tipoVehiculo,$tipoTarifa,$valor1,$valor2,$valor3,$valor4,$valor5,$year,1,$fechaCreacion,$Usuario]);
                    break;
            case 2: $CrearTarifa = DB::Insert('INSERT INTO tarifas (TARIFA, TIPO_TARIFA, VALOR_UNICO, YEAR, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                                VALUES (?,?,?,?,?,?,?)',
                                                [$tipoVehiculo,$tipoTarifa,$vaorUnico,$year,1,$fechaCreacion,$Usuario]);
                    break;
        }

        return $CrearTarifa;
    }

    public static function ConsultaTarifaUpd($tipoVehiculo, $tipoTarifa, $year, $idTarifa){
        $ConsultaTarifa = DB::Select("SELECT * FROM tarifas WHERE TARIFA = $tipoVehiculo AND TIPO_TARIFA = $tipoTarifa AND YEAR = $year AND ESTADO = 1 AND ID_TARIFA NOT IN ($idTarifa)");
        return $ConsultaTarifa;
    }

    public static function ConsultaTarifaUpd1($tipoVehiculo, $tipoTarifa, $year, $idTarifa){
        $ConsultaTarifa = DB::Select("SELECT * FROM tarifas WHERE TARIFA = $tipoVehiculo AND TIPO_TARIFA = $tipoTarifa AND YEAR NOT IN ($year) AND ESTADO = 1 AND ID_TARIFA NOT IN ($idTarifa)");
        return $ConsultaTarifa;
    }

    public static function ActualizarTarifa($idTarifa, $tipoVehiculo, $tipoTarifa, $valor1, $valor2, $valor3, $valor4, $valor5, $vaorUnico, $Usuario, $Estado, $yearTarifa){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        switch($tipoTarifa){
            case 1: $CrearTarifa = DB::Update('UPDATE tarifas
                                                SET VALOR_TARIFA_1 = ?,
                                                VALOR_TARIFA_2 = ?,
                                                VALOR_TARIFA_3 = ?,
                                                VALOR_TARIFA_4 = ?,
                                                VALOR_TARIFA_5 = ?,
                                                ESTADO = ?,
                                                YEAR = ?,
                                                FECHA_ACTUALIZACION = ?,
                                                USUARIO_MODIFICACION = ?
                                                WHERE TARIFA = ?
                                                AND TIPO_TARIFA = ?
                                                AND ID_TARIFA = ?',
                                                [$valor1,$valor2,$valor3,$valor4,$valor5,$Estado,$yearTarifa,$fechaCreacion,$Usuario,$tipoVehiculo,$tipoTarifa,$idTarifa]);
                    break;
            case 2: $CrearTarifa = DB::Update('UPDATE tarifas
                                            SET VALOR_UNICO = ?,
                                            ESTADO = ?,
                                            YEAR = ?,
                                            FECHA_ACTUALIZACION = ?,
                                            USUARIO_MODIFICACION = ?
                                            WHERE TARIFA = ?
                                            AND TIPO_TARIFA = ?
                                            AND ID_TARIFA = ?',
                                            [$vaorUnico,$Estado,$yearTarifa,$fechaCreacion,$Usuario,$tipoVehiculo,$tipoTarifa,$idTarifa]);
                    break;
        }
        
        return $CrearTarifa;
    }

}
