<?php

require_once '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

require_once '../routes/web.php';
require_once '../src/Router.php';
