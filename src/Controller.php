<?php

namespace App;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);

        $file = APPROOT . '/src/View/' . $view . '.php';

        // Check for view file
        if (is_readable($file)) {
            include $file;
        } else {
            // View does not exist
            die('<h1> 404 Page not found </h1>');
        }
    }
}
