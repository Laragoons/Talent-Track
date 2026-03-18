<?php

require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$Router = new Router();
$Router->add('GET', '/home', 'hobbyinterest', 'home');
$Router->add('GET', '/home/detail', 'hobbyinterest', 'detail');
$Router->add('GET', '/home/profile', 'hobbyinterest', 'Profile');
$Router->add('GET', '/home/detail/profile', 'hobbyinterest', 'Profile');
$Router->run();
?>