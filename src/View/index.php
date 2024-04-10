<?php require_once APPROOT . '/src/View/include/header.php'; ?>
<h1>Welcome to Simple PHP MVC Starter!</h1>

<a href="/task/create">+ Create Task</a>
<br>
<br>
<ul>
    <?php foreach ($tasks as $task) : ?>
        <li style="display: flex; gap: 20px;">
            <?= $task->getId() . ' : ' . $task->getDescription() ?> (<?= $task->getIsActive() ?>)

            <a href=<?= "/task/{$task->getId()}/edit" ?>>Edit</a>
            <form id="delete-form" method="POST" action=<?= "/task/" . $task->getId()  ?>>
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $task->getId() ?>">
                <button type="submit">🗑</button>
            </form>
        </li>
        -----------------------
    <?php endforeach; ?>
</ul>

<?php require_once APPROOT . '/src/View/include/footer.php'; ?>