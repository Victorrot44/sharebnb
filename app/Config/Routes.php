<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Render Views

$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::index');
$routes->group('/propietarios', function($routes) {
	$routes->get('/', 'PropietarioController::propietarios');
	$routes->get('nuevo-propietario', 'PropietarioController::nuevoPropietario');
	$routes->post('nuevo-propietario', 'PropietarioController::guardarNuevoPropietario');
	$routes->get('actualizar-propietario/(:num)', 'PropietarioController::editarPropietario/$1');
	$routes->post('actualizar-propietario/(:num)', 'PropietarioController::actualizarPropietario/$1');
});

$routes->group('/catalogos', function($routes) {
	$routes->get('tipo-telefono', 'Catalogos\TipoTelefonoController::index');
	$routes->get('fecha-especial', 'Catalogos\FechaEspecialController::index');
	$routes->get('camas' , 'Catalogos\CamaController::index');
	$routes->get('tipo-servicio' , 'Catalogos\TipoServicioController::index');
	$routes->get('servicios' , 'Catalogos\ServicioController::index');
	$routes->get('mobiliario' , 'Catalogos\MobiliarioController::index');
	$routes->get('fecha-bloqueada' , 'Catalogos\FechaBloqueadaController::index');
});

$routes->group('/propiedades', function($routes) {
	$routes->get('/', 'PropiedadController::index');
	$routes->get('nueva-propiedad', 'PropiedadController::nuevaPropiedad');
});

// API

$routes->group('api', function($routes) {
	$routes->group('catalogos', function($routes) {

		$routes->group('tipo-telefono', function($routes) {
			$routes->get('/', 'Catalogos\TipoTelefonoController::obtenerTiposDeTelefonos');
			$routes->get('tabla', 'Catalogos\TipoTelefonoController::obtenerTabla');
			$routes->post('/', 'Catalogos\TipoTelefonoController::guardarTipoTelefono');
			$routes->delete('(:num)', 'Catalogos\TipoTelefonoController::eleminarTipoTelefono/$1');
			$routes->put('(:num)', 'Catalogos\TipoTelefonoController::actualizarTipoTelefono/$1');
		});

		$routes->group('fecha-especial', function($routes) {
			$routes->get('tabla', 'Catalogos\FechaEspecialController::obtenerTabla');
			$routes->get('(:num)', 'Catalogos\FechaEspecialController::obtenerPorId/$1');
			$routes->post('/', 'Catalogos\FechaEspecialController::guardarFechaEspecial');
			$routes->put('(:num)', 'Catalogos\FechaEspecialController::actualizarFechaEspecial/$1');
			$routes->delete('(:num)', 'Catalogos\FechaEspecialController::eliminarFechaEspecial/$1');
		});
	});

	$routes->group('propietarios', function($routes) {
		$routes->get('/', 'PropietarioController::propietarioFullname');
		$routes->get('tabla', 'PropietarioController::crearTabla');
		$routes->get('propietario/(:num)', 'PropietarioController::infoPropietarioId/$1');
		$routes->delete('(:num)', 'PropietarioController::eleminarPropietario/$1');
	});

	$routes->group('propiedades', function($routes) {
		$routes->post('/', 'PropiedadController::guardarNuevaPropiedad');
		$routes->post('recamaras', 'RecamaraController::guardarRecamaras');
		$routes->post('reglamento', 'ReglamentoController::guardarReglamento');
		$routes->post('fechas-bloqueadas', 'FechaBloqueadaController::guardarFechaBloqueada');
		$routes->post('administrador', 'AdminPropiedadController::guardarAdmin');
	});

	$routes->group('direccion', function($routes) {
		$routes->get('cp/(:any)', 'DireccionController::obtenerColoniasPorCP/$1');
		$routes->get('estado', 'DireccionController::obtenerEstadoPorColonia');
		$routes->get('municipio', 'DireccionController::obtenerMunicipioPorColonia');
	});

	
$routes->group('validaciones-asincronas', ['namespace' => 'App\API\Validaciones'], function($routes) {
		$routes->group('propietario', function($routes) {
			$routes->post('email-unique', 'Asincronas::email_propietario_is_unique');
		});

		$routes->group('fecha-especial', function($routes) {
			$routes->post('concepto-unico', 'Asincronas::concepto_fecha_especial_is_unique');
		});
	});
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
