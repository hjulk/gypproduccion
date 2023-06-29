<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Imagenes extends Model
{
    use HasFactory;

    public static function TipoImagenInicio(){
        $TipoImagenInicio = DB::Select("SELECT * FROM tipo_imagen_inicio");
        return $TipoImagenInicio;
    }

    public static function BuscarImagenInicioName($NombreImagen){
        $BuscarImagenInicioName = DB::select("SELECT * FROM tipo_imagen_inicio WHERE NOMBRE LIKE '%$NombreImagen%'");
        return $BuscarImagenInicioName;
    }

    public static function BuscarImagenInicioByName($nombreImagen, $idTipo){
        $BuscarImagenInicioByName = DB::select("SELECT * FROM tipo_imagen_inicio WHERE NOMBRE LIKE '%$nombreImagen%' AND ID_TIPO NOT IN ($idTipo)");
        return $BuscarImagenInicioByName;
    }

    public static function CrearTipoImagenInicio($NombreImagen,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearDependencia = DB::Insert(
            'INSERT INTO tipo_imagen_inicio (NOMBRE, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        values (?,?,?,?)',
            [$NombreImagen, 1, $fechaCreacion, 1]
        );
        return $CrearDependencia;
    }

    public static function ActualizarTipoImagenInicio($Nombre, $Usuario, $Estado, $IdTipo)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarTipoImagenInicio = DB::Update(
            'UPDATE tipo_imagen_inicio SET
            NOMBRE = ?,
            ESTADO = ?,
            FECHA_MODIFICACION = ?,
            USUARIO_MODIFICACION = ?
            WHERE ID_TIPO = ?',
            [$Nombre, $Estado, $fechaActualizacion, $Usuario, $IdTipo]
        );
        return $ActualizarTipoImagenInicio;
    }

    public static function TipoImagenServicio(){
        $TipoImagenServicio = DB::Select("SELECT * FROM tipo_imagen_servicios");
        return $TipoImagenServicio;
    }

    public static function BuscarImagenServicioName($NombreImagen){
        $BuscarImagenServicioName = DB::select("SELECT * FROM tipo_imagen_servicios WHERE NOMBRE LIKE '%$NombreImagen%'");
        return $BuscarImagenServicioName;
    }

    public static function BuscarImagenServicioByName($nombreImagen, $idTipo){
        $BuscarImagenServicioByName = DB::select("SELECT * FROM tipo_imagen_servicios WHERE NOMBRE LIKE '%$nombreImagen%' AND ID_TIPO NOT IN ($idTipo)");
        return $BuscarImagenServicioByName;
    }

    public static function CrearTipoImagenServicio($NombreImagen,$Usuario){
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaCreacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $CrearDependencia = DB::Insert(
            'INSERT INTO tipo_imagen_servicios (NOMBRE, ESTADO, FECHA_CREACION, USUARIO_CREACION)
                                        values (?,?,?,?)',
            [$NombreImagen, 1, $fechaCreacion, 1]
        );
        return $CrearDependencia;
    }

    public static function ActualizarTipoImagenServicio($Nombre, $Usuario, $Estado, $IdTipo)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $ActualizarTipoImagenServicio = DB::Update(
            'UPDATE tipo_imagen_servicios SET
            NOMBRE = ?,
            ESTADO = ?,
            FECHA_MODIFICACION = ?,
            USUARIO_MODIFICACION = ?
            WHERE ID_TIPO = ?',
            [$Nombre, $Estado, $fechaActualizacion, $Usuario, $IdTipo]
        );
        return $ActualizarTipoImagenServicio;
    }

    public static function SettlementConsultation(){
        $SettlementConsultation = DB::Select("SELECT * FROM imagenes_consulta_liquidacion");
        return $SettlementConsultation;
    }

    public static function ListadoSettlementConsultation(){
        $ListadoSettlementConsultation = DB::Select("SELECT * FROM imagenes_consulta_liquidacion WHERE ESTADO = 1");
        return $ListadoSettlementConsultation;
    }

    public static function ListadoSettlementConsultationById($IdImagen){
        $ListadoSettlementConsultation = DB::Select("SELECT * FROM imagenes_consulta_liquidacion WHERE ESTADO = 1 AND ID_IMAGEN NOT IN ($IdImagen)");
        return $ListadoSettlementConsultation;
    }

    public static function ListadoImagenesName($nombreImagen, $tipoImagen){
        switch($tipoImagen){
            case 4: $ListadoImagenesName = DB::Select("SELECT * FROM imagenes_consulta_liquidacion WHERE NOMBRE_IMAGEN LIKE '%$nombreImagen%'");
                    break;
        }
        return $ListadoImagenesName;
    }

    public static function ListadoImagenesNameId($Nombre, $IdImagen, $tipoImagen){
        switch($tipoImagen){
            case 4: $ListadoImagenesNameId = DB::Select("SELECT * FROM imagenes_consulta_liquidacion WHERE NOMBRE_IMAGEN LIKE '%$Nombre%' AND ID_IMAGEN NOT IN ($IdImagen)");
                    break;
        }
        return $ListadoImagenesNameId;
    }

    public static function ListadoImagenesId($IdImagen, $tipoImagen)
    {
        switch($tipoImagen){
            case 4: $ListadoImagenesId = DB::Select("SELECT * FROM imagenes_consulta_liquidacion WHERE ID_IMAGEN = $IdImagen");
                    break;
        }
        return $ListadoImagenesId;
    }

    public static function CrearImagen($Nombre, $carpeta, $path1, $IdPagina, $IdUser, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        switch($IdPagina){
            case 14: DB::Update("UPDATE imagenes_consulta_liquidacion SET ESTADO = 2");
                    $CrearImagen = DB::Insert(
                                    'INSERT INTO imagenes_consulta_liquidacion (NOMBRE_IMAGEN, UBICACION, UBICACION_WEBP, ESTADO,
                                    FECHA_CREACION,USUARIO_CREACION,PIE_IMAGEN)
                                    VALUES (?,?,?,?,?,?,?)',
                                    [$Nombre, $path1, $carpeta, 1, $fechaCreacion, $IdUser, $pieImagen]
                                    );
                    break;
        }
        // if($FinAno === 1){
        //     $EndYear = date('Y') + 1;
        // }else{
        //     $EndYear = null;
        // }
        // if($TextoImagen){
        //     $CrearImagen = DB::insert(
        //         'INSERT INTO imagenes (NOMBRE_IMAGEN,UBICACION,UBICACION_WEBP,ID_PAGINA,ID_SUBPAGINA,ESTADO,
        //         FECHA_CREACION,USUARIO_CREACION,TEXTO_IMAGEN,ORDEN_IMAGEN,PIE_IMAGEN,ID_GRUA,FIN_ANO,END_YEAR)
        //         VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
        //         [$Nombre, $path1, $carpeta, $IdPagina, $IdSubpagina, 1, $fechaCreacion, $IdUser, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno, $EndYear]
        //     );
        // }else{
        //     $CrearImagen = DB::insert(
        //         'INSERT INTO imagenes (NOMBRE_IMAGEN,UBICACION,UBICACION_WEBP,ID_PAGINA,ID_SUBPAGINA,ESTADO,
        //         FECHA_CREACION,USUARIO_CREACION,ORDEN_IMAGEN,PIE_IMAGEN,ID_GRUA,FIN_ANO,END_YEAR)
        //         VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)',
        //         [$Nombre, $path1, $carpeta, $IdPagina, $IdSubpagina, 1, $fechaCreacion, $IdUser, $OrdenImagen, $pieImagen, $IdGrua, $FinAno, $EndYear]
        //     );
        // }
        return $CrearImagen;
    }

    public static function ActualizarImagen($Nombre, $path, $path1, $IdPagina, $IdUser, $Estado, $IdImagen, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        switch($IdPagina){
            case 14: if($path){
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_consulta_liquidacion SET
                            NOMBRE_IMAGEN = ?,
                            UBICACION = ?,
                            UBICACION_WEBP = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            PIE_IMAGEN = ?
                            WHERE ID_IMAGEN = ?',
                                [$Nombre, $path, $path1, $Estado, $fechaActualizacion, $IdUser, $pieImagen, $IdImagen]
                            );
                    }else{
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes SET
                            NOMBRE_IMAGEN = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            PIE_IMAGEN = ?
                            WHERE ID_IMAGEN = ?',
                                [$Nombre, $Estado, $fechaActualizacion, $IdUser, $pieImagen, $IdImagen]
                            );
                    }
                    break;
        }
        // if($FinAno === 1){
        //     $EndYear = date('Y') + 1;
        // }else{
        //     $EndYear = null;
        // }
        // if ($path) {
        //     $ActualizarImagen = DB::update(
        //         'UPDATE imagenes SET
        //     NOMBRE_IMAGEN = ?,
        //     UBICACION = ?,
        //     UBICACION_WEBP = ?,
        //     ESTADO = ?,
        //     FECHA_MODIFICACION = ?,
        //     USUARIO_MODIFICACION = ?,
        //     ID_PAGINA = ?,
        //     ID_SUBPAGINA = ?,
        //     TEXTO_IMAGEN = ?,
        //     ORDEN_IMAGEN = ?,
        //     PIE_IMAGEN = ?,
        //     ID_GRUA = ?,
        //     FIN_ANO = ?,
        //     END_YEAR = ?
        //     WHERE ID_IMAGEN = ?',
        //         [$Nombre, $path, $path1, $Estado, $fechaActualizacion, $IdUser, $IdPagina, $IdSubpagina, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno, $EndYear, $IdImagen]
        //     );
        // } else {
        //     $ActualizarImagen = DB::update(
        //         'UPDATE imagenes SET
        //     NOMBRE_IMAGEN = ?,
        //     ESTADO = ?,
        //     FECHA_MODIFICACION = ?,
        //     USUARIO_MODIFICACION = ?,
        //     ID_PAGINA = ?,
        //     ID_SUBPAGINA = ?,
        //     TEXTO_IMAGEN = ?,
        //     ORDEN_IMAGEN = ?,
        //     PIE_IMAGEN = ?,
        //     ID_GRUA = ?,
        //     FIN_ANO = ?,
        //     END_YEAR = ?
        //     WHERE ID_IMAGEN = ?',
        //         [$Nombre, $Estado, $fechaActualizacion, $IdUser, $IdPagina, $IdSubpagina, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua,  $FinAno, $EndYear, $IdImagen]
        //     );
        // }
        return $ActualizarImagen;
    }
}
