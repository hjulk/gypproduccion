<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\Admin\AdministradorController;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\UsuarioController;
use App\Http\Controllers\UsuariosController;

Cache::flush();
Session::flush();
Artisan::call('cache:clear');

Route::get('/',[PaginaController::class, 'Inicio'])->name('inicio');
Route::get('trabajo',[PaginaController::class, 'Trabajo'])->name('trabajo');
Route::get('TRABAJO',[PaginaController::class, 'Trabajo'])->name('TRABAJO');
Route::get('Trabajo',[PaginaController::class, 'Trabajo'])->name('Trabajo');
Route::get('mapaSitio',[PaginaController::class, 'MapaSitio'])->name('mapaSitio');
Route::get('MAPASITIO',[PaginaController::class, 'MapaSitio'])->name('MAPASITIO');
Route::get('mapasitio',[PaginaController::class, 'MapaSitio'])->name('mapasitio');
Route::get('Mapasitio',[PaginaController::class, 'MapaSitio'])->name('Mapasitio');
Route::get('crearVisita',[PaginaController::class, 'CrearVisita'])->name('crearVisita');
Route::post('contactenos',[PaginaController::class, 'Contactenos'])->name('contactenos');
Route::post('trabajoNosotros',[PaginaController::class, 'TrabajoNosotros'])->name('trabajoNosotros');

// GYP
Route::get('normatividad',[PaginaController::class, 'Normatividad'])->name('normatividad');
Route::get('NORMATIVIDAD',[PaginaController::class, 'Normatividad'])->name('NORMATIVIDAD');
Route::get('Normatividad',[PaginaController::class, 'Normatividad'])->name('Normatividad');
Route::get('nosotros',[PaginaController::class, 'Nosotros'])->name('nosotros');
Route::get('NOSOTROS',[PaginaController::class, 'Nosotros'])->name('NOSOTROS');
Route::get('Nosotros',[PaginaController::class, 'Nosotros'])->name('Nosotros');

// ATENCIÓN CIUDADANO
Route::get('contacto',[PaginaController::class, 'Contacto'])->name('contacto');
Route::get('CONTACTO',[PaginaController::class, 'Contacto'])->name('CONTACTO');
Route::get('Contacto',[PaginaController::class, 'Contacto'])->name('Contacto');
Route::get('notificacionAviso',[PaginaController::class, 'NotificacionAviso'])->name('notificacionAviso');
Route::get('NOTIFICACIONAVISO',[PaginaController::class, 'NotificacionAviso'])->name('NOTIFICACIONAVISO');
Route::get('Notificacionaviso',[PaginaController::class, 'NotificacionAviso'])->name('Notificacionaviso');

// SERVICIOS
Route::group(['prefix' => 'servicios'],function(){
    Route::get('beneficios',[PaginaController::class, 'Beneficios'])->name('beneficios');
    Route::get('custodiaSegura',[PaginaController::class, 'CustodiaSegura'])->name('custodiaSegura');
    Route::get('gruas',[PaginaController::class, 'Gruas'])->name('gruas');
    Route::get('nuestrosServicios',[PaginaController::class, 'NuestrosServicios'])->name('nuestrosServicios');
    Route::get('procesoInmovilizacion',[PaginaController::class, 'ProcesoInmovilizacion'])->name('procesoInmovilizacion');
    Route::get('procesoRetiro',[PaginaController::class, 'ProcesoRetiro'])->name('procesoRetiro');
    Route::get('tarifas',[PaginaController::class, 'Tarifas'])->name('tarifas');
    Route::get('monitoreoCamaras',[PaginaController::class, 'MonitoreoCamara'])->name('monitoreoCamaras');
    Route::get('mensajeSms',[PaginaController::class, 'MensajeSms'])->name('mensajeSms');
});

//TRAMITES
Route::get('consultaLiquidacion',[PaginaController::class, 'ConsultaLiquidacion'])->name('consultaLiquidacion');
Route::get('CONSULTALIQUIDACION',[PaginaController::class, 'ConsultaLiquidacion'])->name('CONSULTALIQUIDACION');
Route::get('Consultaliquidacion',[PaginaController::class, 'ConsultaLiquidacion'])->name('Consultaliquidacion');
Route::get('pagoLinea',[PaginaController::class, 'PagoLinea'])->name('pagoLinea');
Route::get('PAGOLINEA',[PaginaController::class, 'PagoLinea'])->name('PAGOLINEA');
Route::get('Pagolinea',[PaginaController::class, 'PagoLinea'])->name('Pagolinea');
Route::get('puntosAtencion',[PaginaController::class, 'PuntosAtencion'])->name('puntosAtencion');
Route::get('PUNTOSATENCION',[PaginaController::class, 'PuntosAtencion'])->name('PUNTOSATENCION');
Route::get('Puntosatencion',[PaginaController::class, 'PuntosAtencion'])->name('Puntosatencion');

Auth::routes();
Route::get('login',[LoginController::class, 'Login'])->name('login');
Route::post('acceso',[LoginController::class, 'Acceso'])->name('acceso');
Route::post('recuperarAcceso',[LoginController::class, 'RecuperarAcceso'])->name('recuperarAcceso');

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){
    Route::get('home',[AdministradorController::class, 'Home'])->name('home');
    Route::get('dependencias',[AdministradorController::class, 'Dependencias'])->name('dependencias');
    Route::get('roles',[AdministradorController::class, 'Roles'])->name('roles');
    Route::get('usuarios',[AdministradorController::class, 'Usuarios'])->name('usuarios');
    Route::get('notificaciones',[AdministradorController::class, 'Notificaciones'])->name('notificaciones');
    Route::get('consultaNotificaciones',[AdministradorController::class, 'ConsultaNotificaciones'])->name('consultaNotificaciones');
    Route::post('consultaNotificacion',[AdministradorController::class, 'ConsultaNotificacion'])->name('consultaNotificacion');
    Route::get('desfijaciones',[AdministradorController::class, 'Desfijaciones'])->name('desfijaciones');
    Route::get('consultaDesfijaciones',[AdministradorController::class, 'ConsultaDesfijaciones'])->name('consultaDesfijaciones');
    Route::post('consultaDesfijacion',[AdministradorController::class, 'ConsultaDesfijacion'])->name('conultaDesfijacion');
    Route::get('documentos',[AdministradorController::class, 'Documentos'])->name('documentos');
    Route::get('reporteContacto',[AdministradorController::class, 'ReporteContacto'])->name('reporteContacto');
    Route::post('consultaContacto',[AdministradorController::class, 'ConsultaContacto'])->name('consultaContacto');
    Route::get('reporteHojaVida',[AdministradorController::class, 'ReporteHojaVida'])->name('reporteHojaVida');
    Route::post('consultaHojaVida',[AdministradorController::class, 'ConsultaHojaVida'])->name('consultaHojaVida');
    Route::get('reporteVisitas',[AdministradorController::class, 'ReporteVisitas'])->name('reporteVisitas');
    Route::post('consultaVisitas',[AdministradorController::class, 'ConsultaVisitas'])->name('consultaVisitas');
    Route::get('paginas',[AdministradorController::class, 'Paginas'])->name('paginas');
    Route::get('imagenes',[AdministradorController::class, 'Imagenes'])->name('imagenes');
    Route::get('buscarSubpagina',[AdministradorController::class, 'BuscarSubpagina'])->name('buscarSubpagina');
    Route::get('tipoDocumento',[AdministradorController::class, 'TipoDocumento'])->name('tipoDocumento');
    Route::get('tipoGrua',[AdministradorController::class, 'TipoGrua'])->name('tipoGrua');
    Route::get('logout', function() {
        Auth::logout();
        Session::flush();
        return Redirect::to('login')->with('mensaje_login', 'Salida Segura');
    });
});

Route::group(['prefix' => 'user','namespace' => 'User'],function(){
    Route::get('home',[UsuarioController::class, 'Home'])->name('home');
    Route::get('profileUser',[UsuarioController::class, 'ProfileUser'])->name('profileUser');
    Route::get('notificaciones',[UsuarioController::class, 'Notificaciones'])->name('notificaciones');
    Route::get('consultaNotificaciones',[UsuarioController::class, 'ConsultaNotificaciones'])->name('consultaNotificaciones');
    Route::post('consultaNotificacion',[UsuarioController::class, 'ConsultaNotificacion'])->name('consultaNotificacion');
    Route::get('desfijaciones',[UsuarioController::class, 'Desfijaciones'])->name('desfijaciones');
    Route::get('consultaDesfijaciones',[UsuarioController::class, 'ConsultaDesfijaciones'])->name('consultaDesfijaciones');
    Route::post('consultaDesfijacion',[UsuarioController::class, 'ConsultaDesfijacion'])->name('conultaDesfijacion');
    Route::get('documentos',[UsuarioController::class, 'Documentos'])->name('documentos');
    Route::get('reporteContacto',[UsuarioController::class, 'ReporteContacto'])->name('reporteContacto');
    Route::post('consultaContacto',[UsuarioController::class, 'ConsultaContacto'])->name('consultaContacto');
    Route::get('reporteHojaVida',[UsuarioController::class, 'ReporteHojaVida'])->name('reporteHojaVida');
    Route::post('consultaHojaVida',[UsuarioController::class, 'ConsultaHojaVida'])->name('consultaHojaVida');
    Route::get('reporteVisitas',[UsuarioController::class, 'ReporteVisitas'])->name('reporteVisitas');
    Route::post('consultaVisitas',[UsuarioController::class, 'ConsultaVisitas'])->name('consultaVisitas');
    Route::get('imagenes',[UsuarioController::class, 'Imagenes'])->name('imagenes');
    Route::get('buscarSubpagina',[UsuarioController::class, 'BuscarSubpagina'])->name('buscarSubpagina');
    Route::get('logout', function() {
        Auth::logout();
        Session::flush();
        return Redirect::to('login')->with('mensaje_login', 'Salida Segura');
    });
});

Route::post('crearDependencia',[AdministracionController::class, 'CrearDependencia'])->name('crearDependencia');
Route::post('actualizarDependencia',[AdministracionController::class, 'ActualizarDependencia'])->name('actualizarDependencia');
Route::post('crearRol',[AdministracionController::class, 'CrearRol'])->name('crearRol');
Route::post('actualizarRol',[AdministracionController::class, 'ActualizarRol'])->name('actualizarRol');
Route::post('crearUsuario',[AdministracionController::class, 'CrearUsuario'])->name('crearUsuario');
Route::post('actualizarUsuario',[AdministracionController::class, 'ActualizarUsuario'])->name('actualizarUsuario');
Route::post('crearPagina',[AdministracionController::class, 'CrearPagina'])->name('crearPagina');
Route::post('actualizarPagina',[AdministracionController::class, 'ActualizarPagina'])->name('actualizarPagina');
Route::post('crearSubPagina',[AdministracionController::class, 'CrearSubpagina'])->name('crearSubPagina');
Route::post('actualizarSubpagina',[AdministracionController::class, 'ActualizarSubpagina'])->name('actualizarSubpagina');
Route::post('crearTipoDocumento',[AdministracionController::class, 'CrearTipoDocumento'])->name('crearTipoDocumento');
Route::post('actualizarTipoDocumento',[AdministracionController::class, 'ActualizarTipoDocumento'])->name('actualizarTipoDocumento');
Route::post('crearTipoGrua',[AdministracionController::class, 'CrearTipoGrua'])->name('crearTipoGrua');
Route::post('actualizarTipoGrua',[AdministracionController::class, 'ActualizarTipoGrua'])->name('actualizarTipoGrua');

Route::post('actualizarPerfil',[UsuariosController::class, 'ActualizarPerfil'])->name('actualizarPerfil');
Route::post('cargarNotificacion',[UsuariosController::class, 'CargarNotificacion'])->name('cargarNotificacion');
Route::post('cargarNotificacionManual',[UsuariosController::class, 'CargarNotificacionManual'])->name('cargarNotificacionManual');
Route::post('actualizarNotificacion',[UsuariosController::class, 'ActualizarNotificacion'])->name('actualizarNotificacion');
Route::post('inactivarNotificaciones',[UsuariosController::class, 'InactivarNotificaciones'])->name('inactivarNotificaciones');
Route::post('crearDocumento',[UsuariosController::class, 'CrearDocumento'])->name('crearDocumento');
Route::post('actualizarDocumento',[UsuariosController::class, 'ActualizarDocumento'])->name('actualizarDocumento');
Route::post('crearImagen',[UsuariosController::class, 'CrearImagen'])->name('crearImagen');
Route::post('actualizarImagen',[UsuariosController::class, 'ActualizarImagen'])->name('actualizarImagen');
Route::post('crearDesfijacion',[UsuariosController::class, 'CrearDesfijacion'])->name('crearDesfijacion');
Route::post('actualizarDesfijacion',[UsuariosController::class, 'ActualizarDesfijacion'])->name('actualizarDesfijacion');

