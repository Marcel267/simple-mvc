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

    public function index($id)
    {
        $taskRepository = $this->em->getRepository(Task::class);
        $tasks = $taskRepository->findAll();

        // dd($tasks);
        $this->render('index', ['tasks' => $tasks, 'id' => $id]);
    }

    public function about()
    {
        $this->render('about');
    }

    public function create()
    {
        $task = new Task();
        $task->setDescription('JOOOOOO');
        $task->setIsActive(0);

        $this->em->persist($task);
        $this->em->flush();
        echo 'create route';
    }

    public function store()
    {
        $task = new Task();
        $task->setDescription('JOOOOOO');
        $task->setIsActive(0);

        $this->em->persist($task);
        $this->em->flush();
        echo 'Task created';
    }

    public function edit()
    {
        echo 'edit route';
    }


    public function update()
    {
        echo 'update route';
    }

    public function delete($taskId)
    {
        $task = $this->em->getRepository(Task::class)->findOneBy(['id' => $taskId]);
        if ($task) {
            $this->em->remove($task);
            $this->em->flush();
            redirect('/');
        }
        echo 'delete error';
    }
}
