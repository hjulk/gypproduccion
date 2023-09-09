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

    public static function ImagesBeneficios(){
        $ImagesBeneficios = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 6 AND ID_PAGINA = 4 AND ESTADO = 1 ORDER BY 13 ASC');
        return $ImagesBeneficios;
    }

    public static function ImagesCustodia(){
        $ImagesCustodia = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 7 AND ID_PAGINA = 4 AND ESTADO = 1 ORDER BY 13 ASC');
        return $ImagesCustodia;
    }

    public static function GruaExtraPesado(){
        $GruaExtraPesado = DB::select('SELECT * FROM imagenes
            WHERE ID_SUBPAGINA = 8
            AND ID_PAGINA = 4
            AND ESTADO = 1
            AND ID_GRUA IN (1,2)
            ORDER BY 13 ASC');
        return $GruaExtraPesado;
    }

    public static function GruaPesado(){
        $GruaPesado = DB::select('SELECT * FROM imagenes
            WHERE ID_SUBPAGINA = 8
            AND ID_PAGINA = 4
            AND ESTADO = 1
            AND ID_GRUA IN (3,4)
            ORDER BY 13 ASC');
        return $GruaPesado;
    }

    public static function GruaPlanchon(){
        $GruaPlanchon = DB::select('SELECT * FROM imagenes
            WHERE ID_SUBPAGINA = 8
            AND ID_PAGINA = 4
            AND ESTADO = 1
            AND ID_GRUA IN (5,6)
            ORDER BY 13 ASC');
        return $GruaPlanchon;
    }

    public static function GruaPlanchonMoto(){
        $GruaPlanchon = DB::select('SELECT * FROM imagenes
            WHERE ID_SUBPAGINA = 8
            AND ID_PAGINA = 4
            AND ESTADO = 1
            AND ID_GRUA IN (7,8)
            ORDER BY 13 ASC');
        return $GruaPlanchon;
    }

    public static function GruaIzajeLateral(){
        $GruaPlanchon = DB::select('SELECT * FROM imagenes
            WHERE ID_SUBPAGINA = 8
            AND ID_PAGINA = 4
            AND ESTADO = 1
            AND ID_GRUA IN (9,10)
            ORDER BY 13 ASC');
        return $GruaPlanchon;
    }

    public static function ImgInicio(){
        $ImgInicio = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 0 AND ID_PAGINA = 1 AND ESTADO = 1 ORDER BY 13 ASC');
        return $ImgInicio;
    }

    public static function imagesFinAno(){
        $imagesFinAno = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 0 AND ID_PAGINA = 1 AND FIN_ANO = 1 AND ESTADO = 1 ORDER BY 13 ASC');
        return $imagesFinAno;
    }

    public static function ImgProcesoInmovilizacion(){
        $ImgProcesoInmovilizacion = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 11 AND ID_PAGINA = 4 AND ESTADO = 1 ORDER BY 13 ASC');
        return $ImgProcesoInmovilizacion;
    }

    public static function ImgProcesoRetiro(){
        $ImgProcesoRetiro = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 12 AND ID_PAGINA = 4 AND ESTADO = 1 ORDER BY 13 ASC');
        return $ImgProcesoRetiro;
    }

    public static function ImgTarifas(){
        $ImgTarifas = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 13 AND ID_PAGINA = 4 AND ESTADO = 1 ORDER BY 13 ASC');
        return $ImgTarifas;
    }

    public static function ImgMonitoreo(){
        $ImgMonitoreo = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 10 AND ID_PAGINA = 4 AND ESTADO = 1 ORDER BY 13 ASC');
        return $ImgMonitoreo;
    }

    public static function ImgMensajes(){
        $ImgMensajes = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 9 AND ID_PAGINA = 4 AND ESTADO = 1 ORDER BY 13 ASC');
        return $ImgMensajes;
    }

    public static function ImgNuestrosServicios(){
        $ImgNuestrosServicios = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 16 AND ID_PAGINA = 4 AND ESTADO = 1 ORDER BY 13 ASC');
        return $ImgNuestrosServicios;
    }

    public static function ImgPagoLinea(){
        $ImgPagoLinea = DB::select('SELECT * FROM imagenes WHERE ID_SUBPAGINA = 15 AND ID_PAGINA = 5 AND ESTADO = 1 ORDER BY 13 ASC');
        return $ImgPagoLinea;
    }

    public static function ImagenOrganigrama(){
        $ImgagenOrganigrama = DB::select('SELECT * FROM imagenes_organigrama WHERE ESTADO = 1');
        return $ImgagenOrganigrama;
    }

    public static function BannerHomeActive($tipoPagina, $movil){
        $BannerHomeActive = DB::Select("SELECT * FROM imagenes_inicio WHERE TIPO_IMAGEN = $tipoPagina AND MOVIL = $movil AND ESTADO = 1");
        return $BannerHomeActive;
    }

    public static function CarouselHomeActive($movil){
        $CarouselHomeActive = DB::Select("SELECT * FROM imagenes_carrusel WHERE MOVIL = $movil AND ESTADO = 1 ORDER BY ORDEN ASC");
        return $CarouselHomeActive;
    }

    public static function TarifasHomeActive(){
        $TarifasHomeActive = DB::Select("SELECT * FROM imagenes_inicio WHERE TIPO_IMAGEN = 3 AND MOVIL = 2 AND ESTADO = 1");
        return $TarifasHomeActive;
    }

    public static function EndYearHomeActive(){
        $EndYearHomeActive = DB::Select("SELECT * FROM imagenes_inicio WHERE TIPO_IMAGEN = 2 AND MOVIL = 2 AND ESTADO = 1 AND END_YEAR = 1");
        return $EndYearHomeActive;
    }

    public static function NosotrosPageActive(){
        $NosotrosPageActive = DB::Select("SELECT * FROM imagenes_nosotros WHERE ESTADO = 1");
        return $NosotrosPageActive;
    }

    public static function ConsultaImg(){
        $ConsultaImg = DB::Select("SELECT * FROM imagenes_consulta_liquidacion WHERE ESTADO = 1");
        return $ConsultaImg;
    }

    public static function ImgServicios($idSubPagina){
        $ImgServicios = DB::Select("SELECT * FROM imagenes_servicios WHERE ID_SUBPAGINA = $idSubPagina AND ESTADO = 1 ORDER BY ORDEN_IMAGEN ASC");
        return $ImgServicios;
    }

    public static function ImgGruas($tipoGrua){
        $Grua = '';
        switch($tipoGrua){
            case 'EP' : $Grua = 'AND TIPO_GRUA IN (1,2)';
                        break;
            case 'PE' : $Grua = 'AND TIPO_GRUA IN (3,4)';
                        break;
            case 'PL' : $Grua = 'AND TIPO_GRUA IN (5,6)';
                        break;
            case 'PM' : $Grua = 'AND TIPO_GRUA IN (7,8)';
                        break;
            case 'IL' : $Grua = 'AND TIPO_GRUA IN (9,10)';
                        break;
        }
        $ImgServicios = DB::Select("SELECT * FROM imagenes_gruas WHERE ESTADO = 1 $Grua ORDER BY ORDEN_IMAGEN ASC");
        return $ImgServicios;
    }

    public static function PreguntasFrecuentes(){
        $PreguntasFrecuentes = DB::Select("SELECT * FROM preguntas_frecuentes WHERE ESTADO = 1 ORDER BY ID_PREGUNTA ASC");
        return $PreguntasFrecuentes;
    }

    public static function UpdateEndYearImage(){
        DB::Update("UPDATE imagenes_inicio SET ESTADO = 2 WHERE TIPO_IMAGEN = 2 AND END_YEAR = 1 AND ESTADO 1");
    }
}
