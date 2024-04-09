<?php

/**
 * Get URI path.
 * @return string $uri  Sanitized URI
 */
function getUri(): string
{
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $uri = explode('/', $uri);
    array_shift($uri);
    $uri = implode('/', $uri);

    return $uri;
}

/**
 * Var dump variable and terminate script.
 */
function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}
