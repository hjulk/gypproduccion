<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imagenes;
use App\Models\Administracion;
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
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $listadoInicio  = Imagenes::Inicio();
                $Inicio         = array();
                $contInicio     = 0;
                foreach ($listadoInicio as $value) {
                    $Inicio[$contInicio]['id']            = $value->ID_IMAGEN;
                    $Inicio[$contInicio]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Inicio[$contInicio]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Inicio[$contInicio]['estado']   = 'ACTIVO EN PÁGINA';
                        $Inicio[$contInicio]['label']    = 'badge badge-success';
                    } else {
                        $Inicio[$contInicio]['estado']   = 'INACTIVO EN PÁGINA';
                        $Inicio[$contInicio]['label']    = 'badge badge-danger';
                    }
                    $Inicio[$contInicio]['ubicacion']    = $value->UBICACION;
                    $Inicio[$contInicio]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Inicio[$contInicio]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Inicio[$contInicio]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $tipoGrua = Imagenes::ListarHomePageById($value->TIPO_IMAGEN);
                    if($tipoGrua){
                        foreach($tipoGrua as $row){
                            $Inicio[$contInicio]['imagen'] = $row->NOMBRE;
                        }
                    }
                    $Inicio[$contInicio]['tipo_imagen'] = $value->TIPO_IMAGEN;
                    $Inicio[$contInicio]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contInicio++;
                }
                $TipoImagen = array();
                $TipoImagen[''] = 'Seleccione:';
                $listadoTipoImagen = Imagenes::ListadoTipoImagen();
                if($listadoTipoImagen){
                    foreach($listadoTipoImagen as $row){
                        $TipoImagen[$row->ID_TIPO] = $row->NOMBRE;
                    }
                }
                $OrdenImagen = Imagenes::OrdenImagenHomePage();
                if($OrdenImagen){
                    foreach($OrdenImagen as $value){
                        unset($TipoImagen[$value->TIPO_IMAGEN]);
                    }
                }
                $TipoImagenUpd = array();
                $TipoImagenUpd[''] = 'Seleccione:';
                $listadoTipoImagenUpd = Imagenes::ListadoTipoImagen();
                if($listadoTipoImagenUpd){
                    foreach($listadoTipoImagenUpd as $row){
                        $TipoImagenUpd[$row->ID_TIPO] = $row->NOMBRE;
                    }
                }
                return view('administracion.imagenes.homePage',['Estado' => $Estado,'PiePagina' => $PiePagina, 'Inicio' => $Inicio, 'TipoImagen' => $TipoImagen,
                'TipoImagenUpd' => $TipoImagenUpd]);
            }
        }
    }

    public function ImagesBanner(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $listadoBanner  = Imagenes::Banner();
                $Banner         = array();
                $contBanner     = 0;
                foreach ($listadoBanner as $value) {
                    $Banner[$contBanner]['id']            = $value->ID_IMAGEN;
                    $Banner[$contBanner]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Banner[$contBanner]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Banner[$contBanner]['estado']   = 'ACTIVO EN PÁGINA';
                        $Banner[$contBanner]['label']    = 'badge badge-success';
                    } else {
                        $Banner[$contBanner]['estado']   = 'INACTIVO EN PÁGINA';
                        $Banner[$contBanner]['label']    = 'badge badge-danger';
                    }
                    $Banner[$contBanner]['ubicacion']    = $value->UBICACION;
                    $Banner[$contBanner]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Banner[$contBanner]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Banner[$contBanner]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $Banner[$contBanner]['pie_imagen'] = $value->PIE_IMAGEN;
                    $Banner[$contBanner]['enlace']      = $value->ENLACE;
                    $contBanner++;
                }
                
                return view('administracion.imagenes.banner',['Estado' => $Estado,'PiePagina' => $PiePagina, 'Banner' => $Banner]);
            }
        }
    }

    public function ImagesBannerM(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';            
                $listadoBannerMovil  = Imagenes::BannerMovil();
                $BannerMovil         = array();
                $contBannerMovil     = 0;
                foreach ($listadoBannerMovil as $value) {
                    $BannerMovil[$contBannerMovil]['id']            = $value->ID_IMAGEN;
                    $BannerMovil[$contBannerMovil]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $BannerMovil[$contBannerMovil]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $BannerMovil[$contBannerMovil]['estado']   = 'ACTIVO EN PÁGINA';
                        $BannerMovil[$contBannerMovil]['label']    = 'badge badge-success';
                    } else {
                        $BannerMovil[$contBannerMovil]['estado']   = 'INACTIVO EN PÁGINA';
                        $BannerMovil[$contBannerMovil]['label']    = 'badge badge-danger';
                    }
                    $BannerMovil[$contBannerMovil]['ubicacion']    = $value->UBICACION;
                    $BannerMovil[$contBannerMovil]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $BannerMovil[$contBannerMovil]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $BannerMovil[$contBannerMovil]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $BannerMovil[$contBannerMovil]['pie_imagen'] = $value->PIE_IMAGEN;
                    $BannerMovil[$contBannerMovil]['enlace']      = $value->ENLACE;
                    $contBannerMovil++;
                }
                return view('administracion.imagenes.bannerM',['Estado' => $Estado,'PiePagina' => $PiePagina, 'BannerMovil' => $BannerMovil]);
            }
        }
    }

    public static function ImagesCarousel(){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $Orden = array();
                $Orden[''] = 'Seleccione:';
                $Orden[1]  = 1;
                $Orden[2]  = 2;
                $Orden[3]  = 3;
                $Orden[4]  = 4;
                $Orden[5]  = 5;
                $OrdenCarousel = Imagenes::OrdenCarousel(2);
                if($OrdenCarousel){
                    foreach($OrdenCarousel as $value){
                        unset($Orden[$value->ORDEN]);
                    }
                }
                $OrdenUpd = array();
                $OrdenUpd[''] = 'Seleccione:';
                $OrdenUpd[1]  = 1;
                $OrdenUpd[2]  = 2;
                $OrdenUpd[3]  = 3;
                $OrdenUpd[4]  = 4;
                $OrdenUpd[5]  = 5;
                $listadoCarousel  = Imagenes::Carousel(2);
                $Carousel         = array();
                $contCarousel     = 0;
                foreach ($listadoCarousel as $value) {
                    $Carousel[$contCarousel]['id']              = $value->ID_IMAGEN;
                    $Carousel[$contCarousel]['nombre_imagen']   = $value->NOMBRE_IMAGEN;
                    $Carousel[$contCarousel]['estado_activo']   = $value->ESTADO;
                    $Carousel[$contCarousel]['orden']           = $value->ORDEN;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Carousel[$contCarousel]['estado']   = 'ACTIVO EN PÁGINA';
                        $Carousel[$contCarousel]['label']    = 'badge badge-success';
                    } else {
                        $Carousel[$contCarousel]['estado']   = 'INACTIVO EN PÁGINA';
                        $Carousel[$contCarousel]['label']    = 'badge badge-danger';
                    }
                    $Carousel[$contCarousel]['ubicacion']    = $value->UBICACION;
                    $Carousel[$contCarousel]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Carousel[$contCarousel]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Carousel[$contCarousel]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $Carousel[$contCarousel]['pie_imagen'] = $value->PIE_IMAGEN;
                    $Carousel[$contCarousel]['enlace'] = $value->ENLACE;
                    $contCarousel++;
                }
                return view('administracion.imagenes.carousel',['Estado' => $Estado,'PiePagina' => $PiePagina,'Orden' => $Orden,'OrdenUpd' => $OrdenUpd,
                'Carousel' => $Carousel]);
            }
        }
    }

    public static function ImagesCarouselM(){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $Orden = array();
                $Orden[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $Orden[$i]  = $i;
                }
                $OrdenCarousel = Imagenes::OrdenCarousel(1);
                if($OrdenCarousel){
                    foreach($OrdenCarousel as $value){
                        unset($Orden[$value->ORDEN]);
                    }
                }
                $OrdenUpd = array();
                $OrdenUpd[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $OrdenUpd[$i]  = $i;
                }
                $listadoCarouselM  = Imagenes::Carousel(1);
                $CarouselM         = array();
                $contCarouselM     = 0;
                foreach ($listadoCarouselM as $value) {
                    $CarouselM[$contCarouselM]['id']              = $value->ID_IMAGEN;
                    $CarouselM[$contCarouselM]['nombre_imagen']   = $value->NOMBRE_IMAGEN;
                    $CarouselM[$contCarouselM]['estado_activo']   = $value->ESTADO;
                    $CarouselM[$contCarouselM]['orden']           = $value->ORDEN;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $CarouselM[$contCarouselM]['estado']   = 'ACTIVO EN PÁGINA';
                        $CarouselM[$contCarouselM]['label']    = 'badge badge-success';
                    } else {
                        $CarouselM[$contCarouselM]['estado']   = 'INACTIVO EN PÁGINA';
                        $CarouselM[$contCarouselM]['label']    = 'badge badge-danger';
                    }
                    $CarouselM[$contCarouselM]['ubicacion']    = $value->UBICACION;
                    $CarouselM[$contCarouselM]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $CarouselM[$contCarouselM]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $CarouselM[$contCarouselM]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $CarouselM[$contCarouselM]['pie_imagen'] = $value->PIE_IMAGEN;
                    $CarouselM[$contCarouselM]['enlace'] = $value->ENLACE;
                    $contCarouselM++;
                }
                return view('administracion.imagenes.carouselM',['Estado' => $Estado,'PiePagina' => $PiePagina,'Orden' => $Orden,'OrdenUpd' => $OrdenUpd,
                'CarouselM' => $CarouselM]);
            }
        }
    }

    public function ImagesUs(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $listadoNosotros  = Imagenes::Nosotros();
                $Nosotros         = array();
                $contNosotros     = 0;
                foreach ($listadoNosotros as $value) {
                    $Nosotros[$contNosotros]['id']            = $value->ID_IMAGEN;
                    $Nosotros[$contNosotros]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Nosotros[$contNosotros]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Nosotros[$contNosotros]['estado']   = 'ACTIVO EN PÁGINA';
                        $Nosotros[$contNosotros]['label']    = 'badge badge-success';
                    } else {
                        $Nosotros[$contNosotros]['estado']   = 'INACTIVO EN PÁGINA';
                        $Nosotros[$contNosotros]['label']    = 'badge badge-danger';
                    }
                    $Nosotros[$contNosotros]['ubicacion']    = $value->UBICACION;
                    $Nosotros[$contNosotros]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Nosotros[$contNosotros]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Nosotros[$contNosotros]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $Nosotros[$contNosotros]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contNosotros++;
                }
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                return view('administracion.imagenes.us',['Estado' => $Estado,'PiePagina' => $PiePagina, 'Nosotros' => $Nosotros]);
            }
        }
    }

    public function ImagesOrganigrama(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $listadoOrganigrama  = Imagenes::Organigrama();
                $Organigrama         = array();
                $contOrganigrama     = 0;
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                foreach ($listadoOrganigrama as $value) {
                    $Organigrama[$contOrganigrama]['id']            = $value->ID_ARCHIVO;
                    $Organigrama[$contOrganigrama]['nombre_archivo'] = $value->NOMBRE_ARCHIVO;
                    $Organigrama[$contOrganigrama]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Organigrama[$contOrganigrama]['estado']   = 'ACTIVO EN PÁGINA';
                        $Organigrama[$contOrganigrama]['label']    = 'badge badge-success';
                    } else {
                        $Organigrama[$contOrganigrama]['estado']   = 'INACTIVO EN PÁGINA';
                        $Organigrama[$contOrganigrama]['label']    = 'badge badge-danger';
                    }
                    $Organigrama[$contOrganigrama]['ubicacion']    = $value->UBICACION;
                    $Organigrama[$contOrganigrama]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Organigrama[$contOrganigrama]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Organigrama[$contOrganigrama]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $contOrganigrama++;
                }
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                return view('administracion.imagenes.organigrama',['Estado' => $Estado, 'Organigrama' => $Organigrama]);
            }
        }
    }

    public function ImagesSettlementConsultation(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
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
    }

    ## Servicios

    public function ImagesBenefits(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $Orden = array();
                $Orden[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $Orden[$i]  = $i;
                }
                $OrdenImagen = Imagenes::OrdenImagenServicios(1);
                if($OrdenImagen){
                    foreach($OrdenImagen as $value){
                        unset($Orden[$value->ORDEN_IMAGEN]);
                    }
                }
                $listadoBeneficios  = Imagenes::Beneficios();
                $Beneficios         = array();
                $contBeneficios     = 0;
                foreach ($listadoBeneficios as $value) {
                    $Beneficios[$contBeneficios]['id']            = $value->ID_IMAGEN;
                    $Beneficios[$contBeneficios]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Beneficios[$contBeneficios]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Beneficios[$contBeneficios]['estado']   = 'ACTIVO EN PÁGINA';
                        $Beneficios[$contBeneficios]['label']    = 'badge badge-success';
                    } else {
                        $Beneficios[$contBeneficios]['estado']   = 'INACTIVO EN PÁGINA';
                        $Beneficios[$contBeneficios]['label']    = 'badge badge-danger';
                    }
                    $Beneficios[$contBeneficios]['ubicacion']    = $value->UBICACION;
                    $Beneficios[$contBeneficios]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Beneficios[$contBeneficios]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Beneficios[$contBeneficios]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $Beneficios[$contBeneficios]['orden'] = $value->ORDEN_IMAGEN;
                    $Beneficios[$contBeneficios]['texto_imagen'] = $value->TEXTO_IMAGEN;
                    $Beneficios[$contBeneficios]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contBeneficios++;
                }
                $OrdenUpd = array();
                $OrdenUpd[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $OrdenUpd[$i]  = $i;
                }
                return view('administracion.imagenes.benefits',['Estado' => $Estado,'PiePagina' => $PiePagina,'Orden' => $Orden, 'Beneficios' => $Beneficios,
                'OrdenUpd' => $OrdenUpd]);
            }
        }
    }

    public function ImagesTows(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $TipoGrua = array();
                $TipoGrua[''] = 'Seleccione:';
                $ListadoTipoGrua = Imagenes::ListadoTipoGruas();
                if($ListadoTipoGrua){
                    foreach($ListadoTipoGrua as $value){
                        $TipoGrua[$value->ID_GRUA] = $value->NOMBRE_GRUA;
                    }
                }
                $OrdenGruas = Imagenes::OrdenGruas();
                if($OrdenGruas){
                    foreach($OrdenGruas as $value){
                        unset($TipoGrua[$value->TIPO_GRUA]);
                    }
                }
                $listadoGruas = Imagenes::Gruas();
                $Gruas      = array();
                $contGruas  = 0;
                foreach ($listadoGruas as $value) {
                    $Gruas[$contGruas]['id']            = $value->ID_IMAGEN;
                    $Gruas[$contGruas]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $Gruas[$contGruas]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $Gruas[$contGruas]['estado']   = 'ACTIVO EN PÁGINA';
                        $Gruas[$contGruas]['label']    = 'badge badge-success';
                    } else {
                        $Gruas[$contGruas]['estado']   = 'INACTIVO EN PÁGINA';
                        $Gruas[$contGruas]['label']    = 'badge badge-danger';
                    }
                    $Gruas[$contGruas]['ubicacion']    = $value->UBICACION;
                    $Gruas[$contGruas]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $Gruas[$contGruas]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $Gruas[$contGruas]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $tipoGrua = Administracion::ListarGruaById($value->TIPO_GRUA);
                    if($tipoGrua){
                        foreach($tipoGrua as $row){
                            $Gruas[$contGruas]['grua'] = $row->NOMBRE_GRUA;
                        }
                    }
                    $Gruas[$contGruas]['orden'] = $value->ORDEN_IMAGEN;
                    $Gruas[$contGruas]['tipo_grua'] = $value->TIPO_GRUA;
                    $Gruas[$contGruas]['pie_imagen'] = $value->PIE_IMAGEN;
                    $contGruas++;
                }
                $TipoGruaUpd = array();
                $TipoGruaUpd[''] = 'Seleccione:';
                $ListadoTipoGruaUpd = Imagenes::ListadoTipoGruas();
                if($ListadoTipoGruaUpd){
                    foreach($ListadoTipoGrua as $value){
                        $TipoGruaUpd[$value->ID_GRUA] = $value->NOMBRE_GRUA;
                    }
                }
                return view('administracion.imagenes.tows',['Estado' => $Estado,'PiePagina' => $PiePagina,'TipoGrua' => $TipoGrua,'Gruas' => $Gruas,
                'TipoGruaUpd' => $TipoGruaUpd]);
            }
        }
    }

    public function ImagesMonitoringCameras(Request $request){
        $RolUser        = (int)Session::get('Rol');
        if ($RolUser === 0) {
            return Redirect::to('/');
        } else {
            if ($RolUser != 1) {
                return Redirect::to('user/home');
            } else {
                $PiePagina = 'Foto: GyP Bogotá S.A.S - Año: '.date("Y");
                $Estado = array();
                $Estado[''] = 'Seleccione:';
                $Estado[1]  = 'Activo en página';
                $Estado[2]  = 'Inactivo en página';
                $Orden = array();
                $Orden[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $Orden[$i]  = $i;
                }
                $OrdenImagen = Imagenes::OrdenImagenServicios(4);
                if($OrdenImagen){
                    foreach($OrdenImagen as $value){
                        unset($Orden[$value->ORDEN_IMAGEN]);
                    }
                }
                $listadoMonitoreoCamaras  = Imagenes::MonitoreoCamaras();
                $MonitoreoCamaras         = array();
                $contMonitoreoCamaras     = 0;
                foreach ($listadoMonitoreoCamaras as $value) {
                    $MonitoreoCamaras[$contMonitoreoCamaras]['id']            = $value->ID_IMAGEN;
                    $MonitoreoCamaras[$contMonitoreoCamaras]['nombre_imagen'] = $value->NOMBRE_IMAGEN;
                    $MonitoreoCamaras[$contMonitoreoCamaras]['estado_activo'] = $value->ESTADO;
                    $State  = (int)$value->ESTADO;
                    if ($State === 1) {
                        $MonitoreoCamaras[$contMonitoreoCamaras]['estado']   = 'ACTIVO EN PÁGINA';
                        $MonitoreoCamaras[$contMonitoreoCamaras]['label']    = 'badge badge-success';
                    } else {
                        $MonitoreoCamaras[$contMonitoreoCamaras]['estado']   = 'INACTIVO EN PÁGINA';
                        $MonitoreoCamaras[$contMonitoreoCamaras]['label']    = 'badge badge-danger';
                    }
                    $MonitoreoCamaras[$contMonitoreoCamaras]['ubicacion']    = $value->UBICACION;
                    $MonitoreoCamaras[$contMonitoreoCamaras]['fecha_cargue'] = date('d/m/Y h:i A', strtotime($value->FECHA_CREACION));
                    if ($value->FECHA_MODIFICACION) {
                        $MonitoreoCamaras[$contMonitoreoCamaras]['fecha_modificacion']    = date('d/m/Y h:i A', strtotime($value->FECHA_MODIFICACION));
                    } else {
                        $MonitoreoCamaras[$contMonitoreoCamaras]['fecha_modificacion']    = 'SIN FECHA DE ACTUALIZACIÓN';
                    }
                    $MonitoreoCamaras[$contMonitoreoCamaras]['pie_imagen'] = $value->PIE_IMAGEN;
                    $MonitoreoCamaras[$contMonitoreoCamaras]['orden'] = $value->ORDEN_IMAGEN;
                    $contMonitoreoCamaras++;
                }
                $OrdenUpd = array();
                $OrdenUpd[''] = 'Seleccione:';
                for($i = 1; $i <= 5; $i++){
                    $OrdenUpd[$i]  = $i;
                }
                return view('administracion.imagenes.monitoringCameras',['Estado' => $Estado,'PiePagina' => $PiePagina, 'MonitoreoCamaras' => $MonitoreoCamaras,
                'Orden' => $Orden,'OrdenUpd' => $OrdenUpd]);
            }
        }
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
