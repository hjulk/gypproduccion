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
        $BuscarImagenInicioName = DB::select("SELECT * FROM tipo_imagen_inicio WHERE NOMBRE LIKE '$nombreImagen'");
        return $BuscarImagenInicioName;
    }

    public static function BuscarImagenInicioByName($nombreImagen, $idTipo){
        $BuscarImagenInicioByName = DB::select("SELECT * FROM tipo_imagen_inicio WHERE NOMBRE LIKE '$nombreImagen' AND ID_TIPO NOT IN ($idTipo)");
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
        $BuscarImagenServicioName = DB::select("SELECT * FROM tipo_imagen_servicios WHERE NOMBRE LIKE '$nombreImagen'");
        return $BuscarImagenServicioName;
    }

    public static function BuscarImagenServicioByName($nombreImagen, $idTipo){
        $BuscarImagenServicioByName = DB::select("SELECT * FROM tipo_imagen_servicios WHERE NOMBRE LIKE '$nombreImagen' AND ID_TIPO NOT IN ($idTipo)");
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

    public static function Organigrama(){
        $Organigrama = DB::Select("SELECT * FROM imagenes_organigrama");
        return $Organigrama;
    }

    public static function ListadoOrganigramaById($IdArchivo){
        $ListadoOrganigramaById = DB::Select("SELECT * FROM imagenes_organigrama WHERE ESTADO = 1 AND ID_ARCHIVO NOT IN ($IdArchivo)");
        return $ListadoOrganigramaById;
    }

    public static function Inicio(){
        $Inicio = DB::Select("SELECT * FROM imagenes_inicio WHERE TIPO_IMAGEN IN (2,3) AND MOVIL = 2");
        return $Inicio;
    }

    public static function ListadoTipoImagen(){
        $ListadoTipoImagen = DB::Select("SELECT * FROM tipo_imagen_inicio WHERE ID_TIPO IN (2,3)");
        return $ListadoTipoImagen;
    }

    public static function OrdenImagenHomePage(){
        $OrdenImagenHomePage = DB::Select("SELECT * FROM imagenes_inicio WHERE TIPO_IMAGEN NOT IN (1) AND ESTADO = 1");
        return $OrdenImagenHomePage;
    }

    public static function ListarHomePageById($tipoImagen){
        $ListarHomePageById = DB::Select("SELECT * FROM tipo_imagen_inicio WHERE ID_TIPO = $tipoImagen");
        return $ListarHomePageById;
    }

    public static function Nosotros(){
        $Inicio = DB::Select("SELECT * FROM imagenes_nosotros");
        return $Inicio;
    }

    public static function Banner(){
        $Banner = DB::Select("SELECT * FROM imagenes_inicio WHERE TIPO_IMAGEN = 1 AND MOVIL = 2");
        return $Banner;
    }

    public static function BannerMovil(){
        $BannerMovil = DB::Select("SELECT * FROM imagenes_inicio WHERE TIPO_IMAGEN = 1 AND MOVIL = 1");
        return $BannerMovil;
    }

    public static function Carousel($Movil){
        $Carousel = DB::Select("SELECT * FROM imagenes_carrusel WHERE MOVIL = $Movil");
        return $Carousel;
    }

    public static function Beneficios(){
        $Banner = DB::Select("SELECT * FROM imagenes_servicios WHERE ID_SUBPAGINA = 1");
        return $Banner;
    }

    public static function MonitoreoCamaras(){
        $Banner = DB::Select("SELECT * FROM imagenes_servicios WHERE ID_SUBPAGINA = 4");
        return $Banner;
    }

    public static function Gruas(){
        $Gruas = DB::Select("SELECT * FROM imagenes_gruas");
        return $Gruas;
    }

    public static function OrdenGruas(){
        $OrdenGruas = DB::Select("SELECT TIPO_GRUA FROM imagenes_gruas WHERE ESTADO = 1");
        return $OrdenGruas;
    }

    public static function ListadoTipoGruas(){
        $ListadoTipoGruas = DB::Select('SELECT * FROM tipo_grua ORDER BY NOMBRE_GRUA');
        return $ListadoTipoGruas;
    }

    public static function OrdenCarousel($Movil){
        $OrdenCarousel = DB::Select("SELECT ORDEN FROM imagenes_carrusel WHERE MOVIL = $Movil AND ESTADO = 1");
        return $OrdenCarousel;
    }

    public static function OrdenImagenServicios($IdSubpagina){
        $OrdenCarousel = DB::Select("SELECT ORDEN_IMAGEN FROM imagenes_servicios WHERE ID_SUBPAGINA = $IdSubpagina AND ESTADO = 1");
        return $OrdenCarousel;
    }

    public static function ListadoImagenesGruasName($nombreImagen, $tipoGrua){
        $ListadoImagenesGruasName = DB::Select("SELECT * FROM imagenes_gruas WHERE NOMBRE_IMAGEN LIKE '$nombreImagen'");
        return $ListadoImagenesGruasName;
    }

    public static function ListadoImagenesHomePageName($nombreImagen, $tipoImagen){
        $ListadoImagenesHomePageName = DB::Select("SELECT * FROM imagenes_inicio WHERE NOMBRE_IMAGEN LIKE '$nombreImagen' AND TIPO_IMAGEN = $tipoImagen AND MOVIL = 2");
        return $ListadoImagenesHomePageName;
    }

    public static function ListadoImagenesName($nombreImagen, $tipoImagen){
        switch($tipoImagen){
            case 1: $ListadoImagenesName = DB::Select("SELECT * FROM imagenes_servicios WHERE NOMBRE_IMAGEN LIKE '$nombreImagen' AND ID_SUBPAGINA = 1");
                    break;
            case 2: $ListadoImagenesName = DB::Select("SELECT * FROM imagenes_nosotros WHERE NOMBRE_IMAGEN LIKE '$nombreImagen'");
                    break;
            case 3: $ListadoImagenesName = DB::Select("SELECT * FROM imagenes_organigrama WHERE NOMBRE_ARCHIVO LIKE '$nombreImagen'");
                    break;
            case 4: $ListadoImagenesName = DB::Select("SELECT * FROM imagenes_consulta_liquidacion WHERE NOMBRE_IMAGEN LIKE '$nombreImagen'");
                    break;
            case 5: $ListadoImagenesName = DB::Select("SELECT * FROM imagenes_inicio WHERE NOMBRE_IMAGEN LIKE '$nombreImagen' AND TIPO_IMAGEN = 1 AND MOVIL = 2");
                    break;
            case 6: $ListadoImagenesName = DB::Select("SELECT * FROM imagenes_inicio WHERE NOMBRE_IMAGEN LIKE '$nombreImagen' AND TIPO_IMAGEN = 1 AND MOVIL = 1");
                    break;
            case 7: $ListadoImagenesName = DB::Select("SELECT * FROM imagenes_carrusel WHERE NOMBRE_IMAGEN LIKE '$nombreImagen' AND MOVIL = 2");
                    break;
            case 8: $ListadoImagenesName = DB::Select("SELECT * FROM imagenes_carrusel WHERE NOMBRE_IMAGEN LIKE '$nombreImagen' AND MOVIL = 1");
                    break;
            case 9: $ListadoImagenesName = DB::Select("SELECT * FROM imagenes_servicios WHERE NOMBRE_IMAGEN LIKE '$nombreImagen' AND ID_SUBPAGINA = 4");
                    break;    
        }
        return $ListadoImagenesName;
    }

    public static function ListadoImagenesNameGruaId($Nombre, $IdImagen, $tipoGrua){
        $ListadoImagenesNameGruaId = DB::Select("SELECT * FROM imagenes_gruas WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen) AND TIPO_GRUA = $tipoGrua");
        return $ListadoImagenesNameGruaId;
    }

    public static function ListadoImagenesNameId($Nombre, $IdImagen, $tipoImagen){
        switch($tipoImagen){
            case 1: $ListadoImagenesNameId = DB::Select("SELECT * FROM imagenes_servicios WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen) AND ID_SUBPAGINA = 1");
                    break;
            case 2: $ListadoImagenesNameId = DB::Select("SELECT * FROM imagenes_nosotros WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen)");
                    break;
            case 3: $ListadoImagenesNameId = DB::Select("SELECT * FROM imagenes_organigrama WHERE NOMBRE_ARCHIVO LIKE '$Nombre' AND ID_ARCHIVO NOT IN ($IdImagen)");
                    break;
            case 4: $ListadoImagenesNameId = DB::Select("SELECT * FROM imagenes_consulta_liquidacion WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen)");
                    break;
            case 5: $ListadoImagenesNameId = DB::Select("SELECT * FROM imagenes_inicio WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen) AND TIPO_IMAGEN = 1 AND MOVIL = 2");
                    break;
            case 6: $ListadoImagenesNameId = DB::Select("SELECT * FROM imagenes_inicio WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen) AND TIPO_IMAGEN = 1 AND MOVIL = 1");
                    break;
            case 7: $ListadoImagenesNameId = DB::Select("SELECT * FROM imagenes_carrusel WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen) AND MOVIL = 2");
                    break;
            case 8: $ListadoImagenesNameId = DB::Select("SELECT * FROM imagenes_carrusel WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen) AND MOVIL = 1");
                    break;
            case 9: $ListadoImagenesNameId = DB::Select("SELECT * FROM imagenes_servicios WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen) AND ID_SUBPAGINA = 4");
                    break;
        }
        return $ListadoImagenesNameId;
    }

    public static function ListadoImagenesNameHomePageId($Nombre, $IdImagen, $tipoImagen){
        $ListadoImagenesNameHomePageId = DB::Select("SELECT * FROM imagenes_inicio WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen) AND TIPO_IMAGEN = $tipoImagen AND MOVIL = 2");
        return $ListadoImagenesNameHomePageId;
    }

    public static function ListadoImagenesGruaId($IdImagen, $tipoGrua){
        $ListadoImagenesGruaId = DB::Select("SELECT * FROM imagenes_gruas WHERE ID_IMAGEN = $IdImagen AND TIPO_GRUA = $tipoGrua");
        return $ListadoImagenesGruaId;
    }

    public static function ListadoImagenesInicioId($Nombre, $IdImagen, $tipoImagen){
        $ListadoImagenesInicioId = DB::Select("SELECT * FROM imagenes_inicio WHERE NOMBRE_IMAGEN LIKE '$Nombre' AND ID_IMAGEN NOT IN ($IdImagen) AND TIPO_IMAGEN = $tipoImagen AND MOVIL = 2");
        return $ListadoImagenesInicioId;
    }

    public static function ListadoImagenesId($IdImagen, $tipoImagen)
    {
        switch($tipoImagen){
            case 1: $ListadoImagenesId = DB::Select("SELECT * FROM imagenes_servicios WHERE ID_IMAGEN = $IdImagen AND ID_SUBPAGINA = 1");
                    break;
            case 2: $ListadoImagenesId = DB::Select("SELECT * FROM imagenes_nosotros WHERE ID_IMAGEN = $IdImagen");
                    break;
            case 3: $ListadoImagenesId = DB::Select("SELECT * FROM imagenes_organigrama WHERE ID_ARCHIVO = $IdImagen");
                    break;
            case 4: $ListadoImagenesId = DB::Select("SELECT * FROM imagenes_consulta_liquidacion WHERE ID_IMAGEN = $IdImagen");
                    break;
            case 5: $ListadoImagenesId = DB::Select("SELECT * FROM imagenes_inicio WHERE ID_IMAGEN = $IdImagen AND TIPO_IMAGEN = 1 AND MOVIL = 2");
                    break;
            case 6: $ListadoImagenesId = DB::Select("SELECT * FROM imagenes_inicio WHERE ID_IMAGEN = $IdImagen AND TIPO_IMAGEN = 1 AND MOVIL = 1");
                    break;
            case 7: $ListadoImagenesId = DB::Select("SELECT * FROM imagenes_carrusel WHERE ID_IMAGEN = $IdImagen AND MOVIL = 2");
                    break;
            case 8: $ListadoImagenesId = DB::Select("SELECT * FROM imagenes_carrusel WHERE ID_IMAGEN = $IdImagen AND MOVIL = 1");
                    break;
            case 9: $ListadoImagenesId = DB::Select("SELECT * FROM imagenes_servicios WHERE ID_IMAGEN = $IdImagen AND ID_SUBPAGINA = 4");
                    break;
        }
        return $ListadoImagenesId;
    }

    public static function ListadoImagenesHomePageId($IdImagen, $tipoImagen)
    {
        $ListadoImagenesInicioId =  DB::Select("SELECT * FROM imagenes_inicio WHERE ID_IMAGEN = $IdImagen AND TIPO_IMAGEN = $tipoImagen AND MOVIL = 2");
        return $ListadoImagenesInicioId;
    }

    public static function ListadoImagenesOrderGruaId($IdImagen, $Orden, $tipoGrua){
        $ListadoImagenesOrderGruaId = DB::Select("SELECT * FROM imagenes_gruas WHERE ID_IMAGEN NOT IN ($IdImagen) AND ORDEN_IMAGEN = $Orden AND ESTADO = 1 AND TIPO_GRUA = $tipoGrua");
        return $ListadoImagenesOrderGruaId;
    }

    public static function ListadoImagenesOrderId($IdImagen, $tipoImagen, $Orden){
        switch($tipoImagen){
            case 1: $ListadoImagenesOrderId = DB::Select("SELECT * FROM imagenes_servicios WHERE ID_IMAGEN NOT IN ($IdImagen) AND ORDEN_IMAGEN = $Orden AND ESTADO = 1 AND ID_SUBPAGINA = 1");
                    break;
            case 7: $ListadoImagenesOrderId = DB::Select("SELECT * FROM imagenes_carrusel WHERE ID_IMAGEN NOT IN ($IdImagen) AND MOVIL = 2 AND ORDEN = $Orden AND ESTADO = 1");
                    break;
            case 8: $ListadoImagenesOrderId = DB::Select("SELECT * FROM imagenes_carrusel WHERE ID_IMAGEN NOT IN ($IdImagen) AND MOVIL = 1 AND ORDEN = $Orden AND ESTADO = 1");
                    break;
        }
        return $ListadoImagenesOrderId;
    }

    public static function CrearImagen($Nombre, $carpeta, $path1, $IdPagina, $IdUser, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno, $TipoImagen, $Movil)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i');
        $fechaCreacion  = date('Y-m-d H:i', strtotime($fecha_sistema));
        $nextYear = null;
        $endYear = null;
        switch($IdPagina){
            case 4: $CrearImagen = DB::Insert(
                                    'INSERT INTO imagenes_nosotros (NOMBRE_IMAGEN, UBICACION, UBICACION_WEBP, ESTADO,
                                    FECHA_CREACION,USUARIO_CREACION,PIE_IMAGEN)
                                    VALUES (?,?,?,?,?,?,?)',
                                    [$Nombre, $path1, $carpeta, 1, $fechaCreacion, $IdUser, $pieImagen]
                                    );
                    break;
            case 5: DB::Update("UPDATE imagenes_organigrama SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE ESTADO = 1");
                    $CrearImagen = DB::Insert(
                                    'INSERT INTO imagenes_organigrama (NOMBRE_ARCHIVO, UBICACION, ESTADO,
                                    FECHA_CREACION,USUARIO_CREACION)
                                    VALUES (?,?,?,?,?)',
                                    [$Nombre, $carpeta, 1, $fechaCreacion, $IdUser]
                                    );
                    break;
            case 6: DB::Update("UPDATE imagenes_servicios SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE ORDEN_IMAGEN = $OrdenImagen AND ID_SUBPAGINA = 1 AND ESTADO = 1");
                    $CrearImagen = DB::Insert(
                                    'INSERT INTO imagenes_servicios (NOMBRE_IMAGEN, UBICACION, UBICACION_WEBP, ESTADO,
                                    FECHA_CREACION,USUARIO_CREACION,PIE_IMAGEN,ORDEN_IMAGEN,ID_SUBPAGINA,TEXTO_IMAGEN)
                                    VALUES (?,?,?,?,?,?,?,?,?,?)',
                                    [$Nombre, $path1, $carpeta, 1, $fechaCreacion, $IdUser, $pieImagen, $OrdenImagen, 1, $TextoImagen]
                                    );
                    break;
            case 8: DB::Update("UPDATE imagenes_gruas SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE TIPO_GRUA = $IdGrua AND ESTADO = 1");
                    $CrearImagen = DB::Insert(
                                    'INSERT INTO imagenes_gruas (NOMBRE_IMAGEN, UBICACION, UBICACION_WEBP, ESTADO,
                                    FECHA_CREACION,USUARIO_CREACION,PIE_IMAGEN,TIPO_GRUA,ORDEN_IMAGEN)
                                    VALUES (?,?,?,?,?,?,?,?,?)',
                                    [$Nombre, $path1, $carpeta, 1, $fechaCreacion, $IdUser, $pieImagen, $IdGrua, $OrdenImagen]
                                    );
                    break;
            case 10: DB::Update("UPDATE imagenes_servicios SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE ID_SUBPAGINA = 4 AND  ESTADO = 1");
                    $CrearImagen = DB::Insert(
                                    'INSERT INTO imagenes_servicios (NOMBRE_IMAGEN, UBICACION, UBICACION_WEBP, ESTADO,
                                    FECHA_CREACION,USUARIO_CREACION,PIE_IMAGEN,ID_SUBPAGINA)
                                    VALUES (?,?,?,?,?,?,?,?)',
                                    [$Nombre, $path1, $carpeta, 1, $fechaCreacion, $IdUser, $pieImagen, 4]
                                    );
                    break;
            case 14: DB::Update("UPDATE imagenes_consulta_liquidacion SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser AND ESTADO = 1");
                    $CrearImagen = DB::Insert(
                                    'INSERT INTO imagenes_consulta_liquidacion (NOMBRE_IMAGEN, UBICACION, UBICACION_WEBP, ESTADO,
                                    FECHA_CREACION,USUARIO_CREACION,PIE_IMAGEN)
                                    VALUES (?,?,?,?,?,?,?)',
                                    [$Nombre, $path1, $carpeta, 1, $fechaCreacion, $IdUser, $pieImagen]
                                    );
                    break;
            case 17: 
                    if($Movil === 1){
                        DB::Update("UPDATE imagenes_inicio SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE MOVIL = 1 AND TIPO_IMAGEN = 1 AND ESTADO = 1");
                    }else{
                        DB::Update("UPDATE imagenes_inicio SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE MOVIL = 2 AND TIPO_IMAGEN = 1 AND  ESTADO = 1");
                    }
                    $CrearImagen = DB::Insert(
                                    'INSERT INTO imagenes_inicio (NOMBRE_IMAGEN, UBICACION, UBICACION_WEBP, ESTADO,
                                    FECHA_CREACION,USUARIO_CREACION,PIE_IMAGEN,TIPO_IMAGEN,MOVIL,ENLACE)
                                    VALUES (?,?,?,?,?,?,?,?,?,?)',
                                    [$Nombre, $path1, $carpeta, 1, $fechaCreacion, $IdUser, $pieImagen, $TipoImagen, $Movil, $TextoImagen]
                                    );
                    break;
            case 19: 
                    if($Movil === 1){
                        DB::Update("UPDATE imagenes_carrusel SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE MOVIL = 1 AND ORDEN = $OrdenImagen AND ESTADO = 1");
                    }else{
                        DB::Update("UPDATE imagenes_carrusel SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE MOVIL = 2 AND ORDEN = $OrdenImagen AND ESTADO = 1");
                    }
                    $CrearImagen = DB::Insert(
                                    'INSERT INTO imagenes_carrusel (NOMBRE_IMAGEN, UBICACION, UBICACION_WEBP, ESTADO,
                                    FECHA_CREACION,USUARIO_CREACION,PIE_IMAGEN,ORDEN,MOVIL,ENLACE)
                                    VALUES (?,?,?,?,?,?,?,?,?,?)',
                                    [$Nombre, $path1, $carpeta, 1, $fechaCreacion, $IdUser, $pieImagen, $OrdenImagen, $Movil, $TextoImagen]
                                    );
                    break;
            case 20: 
                        if($TipoImagen === 2){
                            DB::Update("UPDATE imagenes_inicio SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE TIPO_IMAGEN = 2 AND ESTADO = 1");
                            $nextYear = (date('Y')+1);
                            $endYear = 1;
                        }else{
                            DB::Update("UPDATE imagenes_inicio SET ESTADO = 2, FECHA_MODIFICACION = '$fechaCreacion', USUARIO_MODIFICACION = $IdUser WHERE TIPO_IMAGEN = 3 AND ESTADO = 1");
                        }
                        $CrearImagen = DB::Insert(
                                        'INSERT INTO imagenes_inicio (NOMBRE_IMAGEN, UBICACION, UBICACION_WEBP, ESTADO,
                                        FECHA_CREACION,USUARIO_CREACION,PIE_IMAGEN,TIPO_IMAGEN,MOVIL,END_YEAR,YEAR)
                                        VALUES (?,?,?,?,?,?,?,?,?,?,?)',
                                        [$Nombre, $path1, $carpeta, 1, $fechaCreacion, $IdUser, $pieImagen, $TipoImagen, 2, $endYear, $nextYear]
                                        );
                        break;
        }
        
        return $CrearImagen;
    }

    public static function ActualizarImagen($Nombre, $path, $path1, $IdPagina, $IdUser, $Estado, $IdImagen, $TextoImagen, $OrdenImagen, $pieImagen, $IdGrua, $FinAno, $TipoImagen, $Movil)
    {
        date_default_timezone_set('America/Bogota');
        $fecha_sistema  = date('Y-m-d H:i:s');
        $fechaActualizacion  = date('Y-m-d H:i:s', strtotime($fecha_sistema));
        $endYear = null;
        $nextYear = null;
        if($IdPagina == 20){
            if($TipoImagen == 2){
                $nextYear = (date('Y')+1);
                $endYear = 1;
            } 
        }
        switch($IdPagina){
            case 4: if($path){
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_nosotros SET
                            NOMBRE_IMAGEN = ?,
                            UBICACION = ?,
                            UBICACION_WEBP = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            PIE_IMAGEN = ?
                            WHERE ID_IMAGEN = ?',
                                [$Nombre, $path1, $path, $Estado, $fechaActualizacion, $IdUser, $pieImagen, $IdImagen]
                            );
                    }else{
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_nosotros SET
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
            case 5: if($path){
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_organigrama SET
                            NOMBRE_ARCHIVO = ?,
                            UBICACION = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?
                            WHERE ID_ARCHIVO = ?',
                                [$Nombre, $path, $Estado, $fechaActualizacion, $IdUser, $IdImagen]
                            );
                    }else{
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_organigrama SET
                            NOMBRE_ARCHIVO = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?
                            WHERE ID_ARCHIVO = ?',
                                [$Nombre, $Estado, $fechaActualizacion, $IdUser, $IdImagen]
                            );
                    }
                    break;
            case 6: if($path){
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_servicios SET
                            NOMBRE_IMAGEN = ?,
                            UBICACION = ?,
                            UBICACION_WEBP = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            TEXTO_IMAGEN = ?,
                            ORDEN_IMAGEN = ?
                            WHERE ID_IMAGEN = ? AND ID_SUBPAGINA = ?',
                                [$Nombre, $path1, $path, $Estado, $fechaActualizacion, $IdUser, $TextoImagen, $OrdenImagen, $IdImagen, $TipoImagen]
                            );
                    }else{
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_servicios SET
                            NOMBRE_IMAGEN = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            TEXTO_IMAGEN = ?,
                            ORDEN_IMAGEN = ?
                            WHERE ID_IMAGEN = ? AND ID_SUBPAGINA = ?',
                                [$Nombre, $Estado, $fechaActualizacion, $IdUser, $TextoImagen, $OrdenImagen, $IdImagen, $TipoImagen]
                            );
                    }
                    break;
            case 8: if($path){
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_gruas SET
                            NOMBRE_IMAGEN = ?,
                            UBICACION = ?,
                            UBICACION_WEBP = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            ORDEN_IMAGEN = ?
                            WHERE ID_IMAGEN = ? AND TIPO_GRUA = ?',
                                [$Nombre, $path1, $path, $Estado, $fechaActualizacion, $IdUser, $IdGrua, $OrdenImagen, $IdImagen, $IdGrua]
                            );
                    }else{
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_gruas SET
                            NOMBRE_IMAGEN = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            ORDEN_IMAGEN = ?
                            WHERE ID_IMAGEN = ? AND TIPO_GRUA = ?',
                                [$Nombre, $Estado, $fechaActualizacion, $IdUser, $OrdenImagen, $IdImagen, $IdGrua]
                            );
                    }
                    break;
            case 10: if($path){
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_servicios SET
                            NOMBRE_IMAGEN = ?,
                            UBICACION = ?,
                            UBICACION_WEBP = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?
                            WHERE ID_IMAGEN = ? AND ID_SUBPAGINA = ?',
                                [$Nombre, $path1, $path, $Estado, $fechaActualizacion, $IdUser, $IdImagen, $TipoImagen]
                            );
                    }else{
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_servicios SET
                            NOMBRE_IMAGEN = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?
                            WHERE ID_IMAGEN = ? AND ID_SUBPAGINA = ?',
                                [$Nombre, $Estado, $fechaActualizacion, $IdUser, $IdImagen, $TipoImagen]
                            );
                    }
                    break;
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
                                [$Nombre, $path1, $path, $Estado, $fechaActualizacion, $IdUser, $pieImagen, $IdImagen]
                            );
                    }else{
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_consulta_liquidacion SET
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
            case 17: if($path){
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_inicio SET
                            NOMBRE_IMAGEN = ?,
                            UBICACION = ?,
                            UBICACION_WEBP = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            TIPO_IMAGEN = ?,
                            MOVIL = ?,
                            ENLACE = ?
                            WHERE ID_IMAGEN = ?',
                                [$Nombre, $path1, $path, $Estado, $fechaActualizacion, $IdUser, $TipoImagen, $Movil, $TextoImagen, $IdImagen]
                            );
                    }else{
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_inicio SET
                            NOMBRE_IMAGEN = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            TIPO_IMAGEN = ?,
                            MOVIL = ?,
                            ENLACE = ?
                            WHERE ID_IMAGEN = ?',
                                [$Nombre, $Estado, $fechaActualizacion, $IdUser, $TipoImagen, $Movil, $TextoImagen, $IdImagen]
                            );
                    }
                    break;
            case 19: if($path){
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_carrusel SET
                            NOMBRE_IMAGEN = ?,
                            UBICACION = ?,
                            UBICACION_WEBP = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            ORDEN = ?,
                            MOVIL = ?,
                            ENLACE = ?
                            WHERE ID_IMAGEN = ?',
                                [$Nombre, $path1, $path, $Estado, $fechaActualizacion, $IdUser, $OrdenImagen, $Movil, $TextoImagen, $IdImagen]
                            );
                    }else{
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_carrusel SET
                            NOMBRE_IMAGEN = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            ORDEN = ?,
                            MOVIL = ?,
                            ENLACE = ?
                            WHERE ID_IMAGEN = ?',
                                [$Nombre, $Estado, $fechaActualizacion, $IdUser, $OrdenImagen, $Movil, $TextoImagen, $IdImagen]
                            );
                    }
                    break;
            case 20:if($path){
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_inicio SET
                            NOMBRE_IMAGEN = ?,
                            UBICACION = ?,
                            UBICACION_WEBP = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            TIPO_IMAGEN = ?,
                            END_YEAR = ?,
                            YEAR = ?
                            WHERE ID_IMAGEN = ?',
                                [$Nombre, $path1, $path, $Estado, $fechaActualizacion, $IdUser, $TipoImagen, $endYear, $nextYear, $IdImagen]
                            );
                    }else{
                        $ActualizarImagen = DB::update(
                            'UPDATE imagenes_inicio SET
                            NOMBRE_IMAGEN = ?,
                            ESTADO = ?,
                            FECHA_MODIFICACION = ?,
                            USUARIO_MODIFICACION = ?,
                            TIPO_IMAGEN = ?,
                            END_YEAR = ?,
                            YEAR = ?
                            WHERE ID_IMAGEN = ?',
                                [$Nombre, $Estado, $fechaActualizacion, $IdUser, $TipoImagen, $endYear, $nextYear, $IdImagen]
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
