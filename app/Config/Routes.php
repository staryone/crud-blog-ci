<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);

use App\Controllers\Blog;
use App\Controllers\Pages;
use App\Controllers\FileController;

$routes->get('blog', [Blog::class, 'index'], ['as' => 'blog']);
$routes->get('blog/add', [Blog::class, 'add']);
$routes->get('blog/edit/(:segment)', [Blog::class, 'edit']);


$routes->post('blog/add', [Blog::class, 'create']);
$routes->post('blog', [Blog::class, 'update']);
$routes->get('blog/delete/(:segment)', [Blog::class, 'delete']);

$routes->get('blog/(:segment)', [Blog::class, 'show']);

$routes->get('blog/uploads/(:segment)', [FileController::class, 'serve/$1']);

