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
        return view('administracion.imagenes.settlementConsultation');
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
}
