<?php

use App\Controller\TaskController;
use App\Router;

$router = new Router();

//list tasks
$router->get('/', TaskController::class, 'index');
//show about page
$router->get('/about', TaskController::class, 'about');
//show task create form
$router->get('/task/create', TaskController::class, 'create');
$router->get('/create-ten-demo-tasks', TaskController::class, 'createTenDemoTasks');
//store task
$router->post('/task', TaskController::class, 'store');
//show task edit form
$router->get('/task/{taskId}/edit', TaskController::class, 'edit');
//update listing
$router->put('/task/{taskId}', TaskController::class, 'update');
//delete task
$router->delete('/task/{taskId}', TaskController::class, 'delete');

$router->dispatch();
