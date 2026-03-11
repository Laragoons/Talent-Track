<?php

require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$Router = new Router();
$Router->add('GET', '/detail', 'hobbyinterest', 'index');
$Router->run();
?>