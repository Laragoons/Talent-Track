<?php

require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$Router = new Router();
$Router->add('GET', '/Interest', 'InterestControllers', 'Interest');
$Router->add('GET', '/detail/{id}', 'JobControllers', 'detail');
$Router->add('GET', '/Saved', 'JobControllers', 'Save');
$Router->add('GET', '/Login', 'usersControllers', 'Login');
$Router->add('GET', '/Register', 'usersControllers', 'Register');
$Router->add('GET', '/ListJob', 'JobControllers', 'ListJob');
$Router->add('GET', '/', 'usersControllers', 'Register');
$Router->add('GET', '/Profile', 'usersControllers', 'Profile');
$Router->add('GET', '/Home', 'landingControllers', 'index');
$Router->run();
?>