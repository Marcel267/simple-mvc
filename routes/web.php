<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('all_tasks', new Route('/', [
    'controller' => 'HomeController',
    'method' => 'index'
], []));
$routes->add('about', new Route('/about', [
    'controller' => 'HomeController',
    'method' => 'about'
], []));
$routes->add('about_with_param', new Route('/about/{param}', [
    'controller' => 'HomeController',
    'method' => 'aboutWithParam'
]));
