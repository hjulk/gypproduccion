<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    public function Login(){
        return view('login');
    }

    public function Home(){
        $listadoNotificaciones  = Administracion::getNotificacionesAviso();
        $Notificaciones         = array();
        $contNotificacion       = 0;
        foreach($listadoNotificaciones as $value){
            $Notificaciones[$contNotificacion]['NOMBRE']        = $value->NOMBRE_CIUDADANO;
            $Notificaciones[$contNotificacion]['PLACA']         = $value->PLACA;
            $Notificaciones[$contNotificacion]['YEAR']          = $value->YEAR_NOTIFICATION;
            $Notificaciones[$contNotificacion]['FECHA_CREACION'] = date('d/m/Y', strtotime($value->FECHA_CREACION));
            $contNotificacion++;
        }
        $listadoContactenos = Administracion::getContactenos();
        $Contactenos        = array();
        $contContactenos    = 0;
        foreach($listadoContactenos as $value){
            $Contactenos[$contContactenos]['NOMBRE_CIUDADANO']  = $value->NOMBRE_CIUDADANO;
            $Contactenos[$contContactenos]['CORREO']            = $value->CORREO;
            $Contactenos[$contContactenos]['MENSAJE']           = $value->MENSAJE;
            $Contactenos[$contContactenos]['FECHA_CREACION']    = date('d/m/Y', strtotime($value->FECHA_CREACION));
            $contContactenos++;
        }
        $listadoHojaVida = Administracion::getHojaVida();
        $HojaVida        = array();
        $contHojaVida    = 0;
        foreach($listadoHojaVida as $value){
            $HojaVida[$contHojaVida]['NOMBRE_CIUDADANO']  = $value->NOMBRE_CIUDADANO;
            $documento = (int)$value->ID_DOCUMENTO;
            $idTipoDocumento = Administracion::tipoDocumento($documento);
            if($idTipoDocumento){
                foreach($idTipoDocumento as $row){
                    $HojaVida[$contHojaVida]['TIPO_DOCUMENTO'] = $row->NOMBRE_DOCUMENTO;
                }
            }else{
                $HojaVida[$contHojaVida]['TIPO_DOCUMENTO'] = 'SIN TIPO DOCUMENTO';
            }
            $HojaVida[$contHojaVida]['IDENTIFICACION']    = $value->IDENTIFICACION;
            $HojaVida[$contHojaVida]['CORREO']                  = $value->CORREO;
            $HojaVida[$contHojaVida]['TELEFONO']                = $value->TELEFONO;
            $HojaVida[$contHojaVida]['DOCUMENTO']               = $value->DOCUMENTO;
            $HojaVida[$contHojaVida]['FECHA_CREACION']          = date('d/m/Y', strtotime($value->FECHA_CREACION));
            $contHojaVida++;
        }
        return view('administracion.dashboard',['Notificaciones'=>$Notificaciones,'Contactenos'=>$Contactenos,'HojaVida'=>$HojaVida]);
    }

}
