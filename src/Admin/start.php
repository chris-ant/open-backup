<?php

// get a list of of routes
// for each route, match a controller
// this is a very good start: https://reintech.io/blog/building-php-mvc-framework-from-scratch 

// however, I think creating a request class from scratch would be a much better learning experience as we'll use it later on and it can be passed around from 
// controller to model to view if needed. 

// Nope, a request class is a terible start point. Is dry, boring and I only need from it 2-3 methods. 
// Better of starting without one and maybe I'll implement one later one with just what I need. 
// Follow curriosity

// namespace OpenBackup\App\Export\Model;

use OpenBackup\Admin\Router;
use OpenBackup\Admin\Framework;
use OpenBackup\Admin\Controllers;

$pbm_router = new Router();

$pbm_router->addRoute('/', Controllers\ExportAdminController::class, 'index');
$pbm_router->addRoute('/import', Controllers\ImportAdminController::class, 'index');
$pbm_router->addRoute('/backup/id/{id}', Controllers\ImportAdminController::class, 'index');

//$pbm_router->addRoute('/', Controllers\BackupAdminController::class, '');

$pbm_admin_uri = '';
if ( isset($_GET['path']) ){
    $pbm_admin_uri = $_GET['path'];
} else {
    $pbm_admin_uri = '/';
}

$pbm_admin_framework = new Framework($pbm_router, $pbm_admin_uri);

$pbm_admin_framework->dispatch($pbm_admin_uri);

