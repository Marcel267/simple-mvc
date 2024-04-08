<?php

namespace App\Controller;

use App\Container;
use App\Controller;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends Controller
{
    private EntityManagerInterface $em;

    public function __construct()
    {
        $this->em = Container::get('em');
    }

    public function index()
    {
        $taskRepository = $this->em->getRepository(Task::class);
        $tasks = $taskRepository->findAll();

        // dd($tasks);
        $this->render('index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $task = new Task();
        $task->setDescription('JOOOOOO');
        $task->setIsActive(0);

        $this->em->persist($task);
        $this->em->flush();
        echo 'Task created';
    }

    public function about()
    {
        $this->render('about');
    }
}
