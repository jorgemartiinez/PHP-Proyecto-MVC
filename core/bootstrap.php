<?php
ini_set('display_errors',1);

require_once  __DIR__ .'/App.php';
require_once  __DIR__ .'/Request.php';
require_once  __DIR__ .'/Router.php';
require_once  __DIR__ .'/../exceptions/NotFoundException.php';

$config = require_once __DIR__ . '/../app/config.php';
App::bind('config', $config);

$router=Router::load('app/routes.php');
App::bind('router', $router);
