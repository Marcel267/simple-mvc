<?php

namespace App\Controller;

use App\Container;
use App\Controller;
use App\Entity\Category;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class TaskController extends Controller
{
    private EntityManagerInterface $em;

    public function __construct()
    {
        $this->em = Container::get('em');
    }

    //list tasks
    public function index()
    {
        $taskRepository = $this->em->getRepository(Task::class);
        // $tasks = $taskRepository->findAll();
        $tasks = $taskRepository->findBy([], ['id' => 'DESC']);

        $this->render('index', ['tasks' => $tasks]);
    }

    //show about page
    public function about()
    {
        $this->render('about');
    }

    //show task create form
    public function create()
    {
        $this->render('task/create');
    }

    //store task
    public function store()
    {
        if ($_POST && !empty($_POST['description'])) {
            $task = new Task();
            $task->setDescription($_POST['description']);
            $task->setIsActive($_POST['isActive'] ? 1 : 0);

            $this->em->persist($task);
            $this->em->flush();
            redirect('/');
        }

        die('Note could not be created');
    }

    //show task edit form
    public function edit($taskId)
    {
        $task = $this->em->getRepository(Task::class)->findOneBy(['id' => $taskId]);

        if (!$task) {
            die('Task not found');
        }
        $this->render('task/edit', [
            'task' => $task
        ]);
    }

    //update listing
    public function update($taskId)
    {
        $task = $this->em->getRepository(Task::class)->findOneBy(['id' => $taskId]);

        if (!$task) {
            die('Task not found');
        }

        if (!$_POST || empty($_POST['description'])) {
            die('Note could not be updated');
        }

        $task->setDescription($_POST['description']);
        $task->setIsActive($_POST['isActive'] ? 1 : 0);

        $this->em->flush();
        redirect('/');
    }

    //delete task
    public function delete($taskId)
    {
        $task = $this->em->getRepository(Task::class)->findOneBy(['id' => $taskId]);

        if (!$task) {
            die('Task not found');
        }

        $this->em->remove($task);
        $this->em->flush();
        redirect('/');
    }

    public function createDemoTasks()
    {

        $category = $this->em->getRepository(Category::class)->findOneBy(['id' => 1]);
        if (!$category) {
            $category = new Category();
            $category->setName('Kategorie 1');
            $this->em->persist($category);
        }

        for ($i = 0; $i < 5; $i++) {
            $task = new Task();
            $task->setDescription('Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum voluptas voluptatem hic fugiat atque eum labore! Alias a inventore ad sapiente magnam rem eligendi dolores blanditiis sit, corrupti neque vel!');
            $task->setIsActive(($i % 2 == 0) ? 0 : 1);
            $task->setCategory($category);
            $this->em->persist($task);
        }
        $this->em->flush();
        redirect('/');
    }
}
