<?php require_once APPROOT . '/src/View/include/header.php'; ?>
<h1>Welcome to Simple PHP MVC Starter!</h1>

<ul>
    <?php foreach ($tasks as $task) : ?>
        <li><?= $task->getId() . ' : ' . $task->getDescription() ?> (<?= $task->getIsActive() ?>)</li>
        -----------------------
    <?php endforeach; ?>
</ul>
<?php require_once APPROOT . '/src/View/include/footer.php'; ?>