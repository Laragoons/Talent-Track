<?php

session_start();

require_once __DIR__ . '/../app/core/Router.php';

use App\Core\Router;

$Router = new Router();

$Router->add('GET', '/',            'usersControllers',    'Register');
$Router->add('GET', '/Register',    'usersControllers',    'Register');
$Router->add('GET', '/Login',       'usersControllers',    'Login');
$Router->add('GET', '/Home',        'landingControllers',  'index');
$Router->add('GET', '/Interest',    'InterestControllers', 'Interest');
$Router->add('GET', '/ListJob',     'JobControllers',      'ListJob');
$Router->add('GET', '/Saved',       'JobControllers',      'Save');
$Router->add('GET', '/Profile',     'usersControllers',    'Profile');
$Router->add('GET', '/detail/{id}', 'JobControllers',      'detail');
$Router->add('GET', '/logout',      'usersControllers',    'logout');

$Router->add('POST', '/Register',        'usersControllers',    'prosesRegister');
$Router->add('POST', '/Login',           'usersControllers',    'prosesLogin');
$Router->add('POST', '/toggleSave',      'JobControllers',      'toggleSave');
$Router->add('POST', '/toggleSaveAjax',  'JobControllers',      'toggleSaveAjax');
$Router->add('POST', '/saveInterests',   'InterestControllers', 'saveInterests');
$Router->add('POST', '/deleteInterest',  'InterestControllers', 'deleteInterest');
$Router->add('POST', '/unsaveCareers',   'JobControllers',      'unsaveCareers');

$Router->run();
?>