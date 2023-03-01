<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
use App\Controllers\Pages;
use App\Controllers\Verif;
use App\Controllers\CreateAccount;
use App\Controllers\InfosTrucks;
use App\Controllers\Trucks;
use App\Controllers\Command;
use App\Controllers\GestionTruck;
use App\Controllers\GestionEvent;
use App\Controllers\ModifAccount;
use App\Controllers\CRUD;
$routes->get('/', 'Home::index');
$routes->get('pages', [Pages::class, 'index']);
$routes->get('logout', [Pages::class, 'logOut']);
$routes->get('findtruck',[InfosTrucks::class,'getData']);
$routes->get('truck',[Trucks::class,'infoPage']);
$routes->get('carte',[Trucks::class,'cartePage']);
$routes->get('gestiontruck',[Verif::class,'gestionTruck']);
$routes->get('modif',[GestionTruck::class,'modifPage']);
$routes->get('newTruck',[GestionTruck::class,'getSpeCity']);
$routes->get('eventPerso',[GestionEvent::class,'eventPerso']);
$routes->get('event',[GestionEvent::class,'verifRole']);
$routes->get('myEvent',[GestionEvent::class,'myEvent']);
$routes->get('validCommand',[Command::class,'commandPage']);
$routes->get('commandGerant',[Command::class,'gerantPage']);
$routes->get('supprCommand',[Command::class,'supprCommand']);
$routes->get('admin',[CRUD::class,'loadPage']);
$routes->get('changeUser',[CRUD::class,'changeUser']);
$routes->get('deleteUser',[CRUD::class,'deleteUser']);
$routes->get('changeGerant',[CRUD::class,'changeGerant']);
$routes->get('deleteGerant',[CRUD::class,'deleteGerant']);
$routes->get('changeTruck',[CRUD::class,'changeTruck']);
$routes->get('deleteTruck',[CRUD::class,'deleteTruck']);
$routes->get('deleteEvent',[CRUD::class,'deleteEvent']);
$routes->get('(:segment)', [Pages::class, 'view']);
$routes->get('connexion/(:segment)', [Pages::class, 'view']);
$routes->get('inscription/(:segment)', [Pages::class, 'view']);
$routes->post('/', [Verif::class, 'start']);
$routes->post('create',[CreateAccount::class,'start']);
$routes->post('find',[Trucks::class,'findTruck']);
$routes->post('addTruck',[GestionTruck::class,'addTruck']);
$routes->post('eventP',[GestionEvent::class,'addEvent']);
$routes->post('accept',[GestionEvent::class,'acceptEvent']);
$routes->post('desister',[GestionEvent::class,'supprEvent']);
$routes->post('modif',[ModifAccount::class,'modifData']);
$routes->post('validCommand',[Command::class,'verifConnection']);
$routes->post('command',[Command::class,'addCommand']);
$routes->post('coCommand',[Command::class,'start']);
$routes->post('admin',[CRUD::class,'modif']);


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
