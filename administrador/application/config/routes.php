<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']    = 'Pages';
$route['salir']                 = 'login/logout';
$route['controlHoras']      	= 'pages/controlHoras';
$route['editarControlHoras']    = 'pages/editarControlHoras';
$route['updateControlHoras']    = 'pages/updateControlHoras';


$route['usuarios']              = 'pages/usuarios';
$route['reporteIngresos']       = 'pages/reporteIngresos';
$route['agregar_usuario']       = 'pages/agregarUsuario';
$route['editar_usuario']        = 'pages/editar_usuario';
$route['importarUsuarios']      = 'pages/importarUsuarios';
$route['inactivarUsuario']   	= 'pages/inactivarUsuario';
$route['borrarUsuario']   		= 'pages/borrarUsuario';
$route['exportCSV']   			= 'pages/exportCSV';

$route['dashboard']             = 'pages/index';
$route['administrador']         = 'pages/login';

$route['ComunicadosFiltro']     = 'pages/ComunicadosFiltro';
$route['editarComunicado']      = 'pages/editarComunicado';
$route['updateComunicado']      = 'pages/updateComunicado';
$route['agregarComunicado']     = 'pages/agregarComunicado';
$route['inactivarComunicado']   = 'pages/inactivarComunicado';
$route['borrarComunicado']   	= 'pages/borrarComunicado';

$route['ActivacionFiltro']      = 'pages/ActivacionFiltro';
$route['agregarActivacion']     = 'pages/agregarActivacion';
$route['borrarActivacion']      = 'pages/borrarActivacion';
$route['inactivarActivacion']   = 'pages/inactivarActivacion';
$route['updateActivacion']      = 'pages/updateActivacion';
$route['editarActivacion']      = 'pages/editarActivacion';


$route['filtrarPromociones'] 	= 'pages/filtrarPromociones';
$route['editarPromocion']       = 'pages/editarPromocion';
$route['agregarPromocion']      = 'pages/agregarPromocion';
$route['updatePromocion']       = 'pages/updatePromocion';
$route['inactivarPromocion']    = 'pages/inactivarPromocion';
$route['borrarPromocion']       = 'pages/borrarPromocion';
$route['importarPromociones']  	= 'pages/importarPromociones';

$route['NotificacionFiltro']    = 'pages/NotificacionFiltro';
$route['editarNotificacion']    = 'pages/editarNotificacion';
$route['agregarNotificacion']   = 'pages/agregarNotificacion';
$route['updateNotificacion']    = 'pages/updateNotificacion';
$route['inactivarNotificacion'] = 'pages/inactivarNotificacion';
$route['borrarNotificacion']    = 'pages/borrarNotificacion';
$route['reEnviarNotificacion']  = 'pages/reEnviarNotificacion';


$route['tipoPromo']             = 'pages/tipoPromo';
$route['editar_tipoPromo']      = 'pages/editar_tipoPromo';
$route['agregarTipoPromo']      = 'pages/agregarTipoPromo';
$route['updateTipoPromo']       = 'pages/updateTipoPromo';
$route['borrar_tipoPromo']      = 'pages/borrar_tipoPromo';
$route['inactivar_tipoPromo']   = 'pages/inactivar_tipoPromo';

$route['Rewards']               = 'pages/Rewards';
$route['editarRewards']         = 'pages/editarRewards';
$route['agregarRewards']        = 'pages/agregarRewards';
$route['updateRewards']         = 'pages/updateRewards';
$route['eliminarRewards']       = 'pages/eliminarRewards';

$route['Medio']                 = 'pages/Medio';
$route['editarMedio']           = 'pages/editarMedio';
$route['agregarMedio']          = 'pages/agregarMedio';
$route['updateMedio']           = 'pages/updateMedio';
$route['borrarMedio']         	= 'pages/borrarMedio';
$route['inactivarMedio']        = 'pages/inactivarMedio';

$route['Incentivos']            = 'pages/Incentivos';
$route['editarIncentivos']   	= 'pages/editarIncentivos';
$route['updateIncentivos']     	= 'pages/updateIncentivos';
$route['agregarProvedores']     = 'pages/agregarProvedores';


$route['Provedores']            = 'pages/Provedores';
$route['editarProvedores']   	= 'pages/editarProvedores';
$route['updateProvedores']     	= 'pages/updateProvedores';
$route['agregarIncentivos']     = 'pages/agregarIncentivos';
$route['contenidoIncentivos']   = 'pages/contenidoIncentivos';

$route['agregarcontenidoIncentivos']   = 'pages/agregarcontenidoIncentivos';

$route['PDV']   				= 'pages/PDV';
$route['agregarPdv']  			= 'pages/agregarPdv';
$route['editarPdv']   			= 'pages/editarPdv';
$route['updatePdv']     		= 'pages/updatePdv';


$route['ventas']     		= 'pages/ventas';
$route['DetalleVentas']     		= 'pages/DetalleVentas';


$route['BannersFiltro']         = 'pages/BannersFiltro';
$route['agregarBanner']         = 'pages/agregarBanner';
$route['editarBanner']          = 'pages/editarBanner';
$route['borrarBanner']          = 'pages/borrarBanner';
$route['inactivarBanner']       = 'pages/inactivarBanner';

$route['Contacto']              = 'pages/Contacto';
$route['agregarContacto']       = 'pages/agregarContacto';
$route['editarSobreNosotros']   = 'pages/editarContacto';
$route['eliminarContacto']      = 'pages/eliminarContacto';

$route['agregarBanner']         = 'pages/agregarBanner';

$route['reglamento']   			= 'pages/reglamento';
$route['editarReglamento']  	= 'pages/editarReglamento';

$route['Facturas']   			= 'pages/Facturas';
$route['editarFacturas']   		= 'pages/editarFacturas';

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;