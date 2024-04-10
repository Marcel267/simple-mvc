<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    <title> <?= APPTITEL; ?> </title>
</head>

<body class="container">
    <nav>
        <ul>
            <a href="/">
                <li><strong>Simple MVC</strong></li>
            </a>
        </ul>
        <ul>
            <li><a href="<?= URLROOT; ?>"> Home </a></li>
            <li><a href="<?= URLROOT; ?>/about"> About </a></li>
            <li><a href="<?= URLROOT; ?>/create-ten-demo-tasks"> Create 10 demo-tasks </a></li>
        </ul>
    </nav>