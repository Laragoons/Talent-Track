<?php

require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$Router = new Router();
$Router->add('GET', '/MinatBakat', 'MinatBakatControllers', 'MinatBakat');
$Router->add('GET', '/detail/{id}', 'PekerjaanControllers', 'detail');
$Router->add('GET', '/saved', 'PekerjaanControllers', 'Save');
$Router->add('GET', '/Login', 'usersControllers', 'Login');
$Router->add('GET', '/Register', 'usersControllers', 'Register');
$Router->add('GET', '/ListPekerjaan', 'PekerjaanControllers', 'List');
$Router->add('GET', '/', 'usersControllers', 'Register');
$Router->add('GET', '/Profile', 'usersControllers', 'Profile');
$Router->add('GET', '/Home', 'landingControllers', 'index');
$Router->run();
?>