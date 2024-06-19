<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    default :
        require __DIR__ . '/public/main.php';
        break;
}
