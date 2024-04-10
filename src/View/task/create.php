<?php require_once APPROOT . '/src/View/include/header.php'; ?>
<h1>Create task</h1>
<form action="/task" method="post">
    <label for="description">Description</label>
    <input type="text" name="description" id="description" value="<?= $task ? $task->getDescription() : '' ?>">
    <span style="color: red;">
        <?= $errors['description'] ?? '' ?>
    </span>

    <label for="isActive">isActive</label>
    <input type="checkbox" name="isActive" id="isActive" <?= $task ? ($task->getIsActive() ? 'checked' : '') : '' ?>>
    <span style="color: red;">
        <?= $errors['isActive'] ?? '' ?>
    </span>
    <input type="submit" value="Submit">
</form>


<?php require_once APPROOT . '/src/View/include/footer.php'; ?>