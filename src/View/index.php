<h1>Welcome to Simple PHP MVC Starter!</h1>

<ul>
    <?php foreach ($tasks as $task) : ?>
        <li><?= $task->description ?> (<?= $task->completed ?>)</li>
    <?php endforeach; ?>
</ul>