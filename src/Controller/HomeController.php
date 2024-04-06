<?php

namespace App\Controller;

use App\Controller;
use App\Model\Task;

class HomeController extends Controller
{
    private Task $taskModel;

    public function __construct()
    {
        $this->taskModel = new Task;
    }

    public function index()
    {
        $tasks = $this->taskModel->selectAll();

        $this->render('index', ['tasks' => $tasks]);
    }

    public function about()
    {
        $this->render('about');
    }
}
