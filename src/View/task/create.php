<?php require_once APPROOT . '/src/View/include/header.php'; ?>
<h1>Create Task</h1>
<form action="/task" method="post">
    <label for="description">Description</label>
    <input type="text" name="description" id="description">
    <?= $errors['description'] ?? '' ?>

    <label for="isActive">isActive</label>
    <input type="checkbox" name="isActive" id="isActive">
    <?= $errors['isActive'] ?? '' ?>

    <input type="submit" value="submit">
</form>


<?php require_once APPROOT . '/src/View/include/footer.php'; ?>
