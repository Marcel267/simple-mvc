<?php

namespace App\Controller;

use App\Controller;
use App\Model\Task;
use Symfony\Component\Routing\RouteCollection;

class HomeController extends Controller
{
    private Task $taskModel;

    public function __construct()
    {
        $this->taskModel = new Task;
    }

    public function index(RouteCollection $routes)
    {
        $tasks = $this->taskModel->selectAll();
        $routeToAbout = $routes->get('about')->getPath();

        $this->render('index', [
            'tasks' => $tasks,
            'routeToAbout' => $routeToAbout
        ]);
    }

    public function about(RouteCollection $routes)
    {
        $this->render('about');
    }
}
