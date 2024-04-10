<?php

use App\Controller\HomeController;
use App\Router;

$router = new Router();

//show tasks
$router->get('/', HomeController::class, 'index');
//show about page
$router->get('/about', HomeController::class, 'about');
//show task create form
$router->get('/task/create', HomeController::class, 'create');
$router->get('/create-ten-demo-tasks', HomeController::class, 'createTenDemoTasks');
//store task
$router->post('/task', HomeController::class, 'store');
//show task edit form
$router->get('/task/{taskId}/edit', HomeController::class, 'edit');
//update listing
$router->put('/task/{taskId}', HomeController::class, 'update');
$router->get('/task/{taskId}', HomeController::class, 'update');
//delete task
$router->delete('/task/{taskId}', HomeController::class, 'delete');

$router->dispatch();
