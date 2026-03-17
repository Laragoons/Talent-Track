<?php

require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$Router = new Router();
$Router->add('GET', '/home', 'hobbyinterest', 'home');
$Router->add('GET', '/home/detail', 'hobbyinterest', 'detail');
$Router->run();
?>