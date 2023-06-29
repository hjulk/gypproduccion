<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imagenes;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Http\Controllers\AdministracionController;

class ImagesController extends Controller
{
    public function ImagesHomePage(Request $request){
        return view('administracion.imagenes.homePage');
    }

    public function ImagesUs(Request $request){
        return view('administracion.imagenes.us');
    }

    public function ImagesOrganigrama(Request $request){
        return view('administracion.imagenes.orgranigrama');
    }

    public function ImagesSettlementConsultation(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('/');
        }else{
            $listadoSettlementConsultation  = Imagenes::SettlementConsultation();
            $SettlementConsultation         = array();
            $contSettlementConsultation     = 0;
            $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
            foreach ($listadoSettlementConsultation as $value) {
                $SettlementConsultation[$contSettlementConsultation]['id']            = $value->ID_IMAGEN;
                $SettlementConsultation[$contSettlementConsultation]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                $SettlementConsultation[$contSettlementConsultation]['estado_activo'] = $value->ESTADO;
                $State  = (int)$value->ESTADO;
                if ($State === 1) {
                    $SettlementConsultation[$contSettlementConsultation]['estado']   = 'ACTIVO EN PÁGINA';
                    $SettlementConsultation[$contSettlementConsultation]['label']    = 'badge badge-success';
                } else {
                    $SettlementConsultation[$contSettlementConsultation]['estado']   = 'INACTIVO EN PÁGINA';
                    $SettlementConsultation[$contSettlementConsultation]['label']    = 'badge badge-danger';
                }
                $SettlementConsultation[$contSettlementConsultation]['ubicacion']    = $value->UBICACION;
                $SettlementConsultation[$contSettlementConsultation]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                if ($value->FECHA_MODIFICACION) {
                    $SettlementConsultation[$contSettlementConsultation]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                } else {
                    $SettlementConsultation[$contSettlementConsultation]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                }
                $SettlementConsultation[$contSettlementConsultation]['pie_imagen'] = $value->PIE_IMAGEN;
                $contSettlementConsultation++;
            }
            $Estado = array();
            $Estado[''] = 'Seleccione:';
            $Estado[1]  = 'Activo en página';
            $Estado[2]  = 'Inactivo en página';
            return view('administracion.imagenes.settlementConsultation',['PiePagina' => $PiePagina, 'SettlementConsultation' => $SettlementConsultation,
            'Estado' => $Estado]);
        }
    }

    ## Servicios

    public function ImagesBenefits(Request $request){
        return view('administracion.imagenes.benefits');
    }

    public function ImagesTows(Request $request){
        return view('administracion.imagenes.tows');
    }

    public function ImagesMonitoringCameras(Request $request){
        return view('administracion.imagenes.monitoringCameras');
    }

    public function TipoImagen(){
        $RolUser        = (int)Session::get('Rol');
        if($RolUser === 0){
            return Redirect::to('/');
        }else{
            if($RolUser != 1){
                return Redirect::to('user/home');
            }else{
                $listadoTipoImageInicio  = Imagenes::TipoImagenInicio();
                $TipoImageInicio         = array();
                $contTipoImageInicio     = 0;
                foreach ($listadoTipoImageInicio as $value) {
                    $TipoImageInicio[$contTipoImageInicio]['id']            = $value->ID_TIPO;
                    $TipoImageInicio[$contTipoImageInicio]['nombre_inicio'] = $value->NOMBRE;
                    $TipoImageInicio[$contTipoImageInicio]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $TipoImageInicio[$contTipoImageInicio]['estado']   = 'ACTIVO EN PÁGINA';
                        $TipoImageInicio[$contTipoImageInicio]['label']    = 'badge badge-success';
                    } else {
                        $TipoImageInicio[$contTipoImageInicio]['estado']   = 'INACTIVO EN PÁGINA';
                        $TipoImageInicio[$contTipoImageInicio]['label']    = 'badge badge-danger';
                    }
                    $contTipoImageInicio++;
                }
                $listadoTipoImageServicio  = Imagenes::TipoImagenServicio();
                $TipoImageServicio         = array();
                $contTipoImageServicio     = 0;
                foreach ($listadoTipoImageServicio as $value) {
                    $TipoImageServicio[$contTipoImageServicio]['id']            = $value->ID_TIPO;
                    $TipoImageServicio[$contTipoImageServicio]['nombre_servicio'] = $value->NOMBRE;
                    $TipoImageServicio[$contTipoImageServicio]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $TipoImageServicio[$contTipoImageServicio]['estado']   = 'ACTIVO EN PÁGINA';
                        $TipoImageServicio[$contTipoImageServicio]['label']    = 'badge badge-success';
                    } else {
                        $TipoImageServicio[$contTipoImageServicio]['estado']   = 'INACTIVO EN PÁGINA';
                        $TipoImageServicio[$contTipoImageServicio]['label']    = 'badge badge-danger';
                    }
                    $contTipoImageServicio++;
                }
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                return view('administracion.tipoImagen',['TipoImageInicio' => $TipoImageInicio,'TipoImageServicio' => $TipoImageServicio, 'Estado' => $Estado]);
            }
        }
    }
}
