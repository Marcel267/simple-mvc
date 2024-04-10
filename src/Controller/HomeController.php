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

    public function createTenDemoTasks()
    {
        for ($i = 0; $i < 10; $i++) {
            $task = new Task();
            $task->setDescription('Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum voluptas voluptatem hic fugiat atque eum labore! Alias a inventore ad sapiente magnam rem eligendi dolores blanditiis sit, corrupti neque vel!');
            $task->setIsActive(($i % 2 == 0) ? 0 : 1);
            $this->em->persist($task);
        }
        $this->em->flush();
        redirect('/');
    }
}
