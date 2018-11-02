<?php
namespace cursophp7\core;

ini_set('display_errors',1);

session_start();

use cursophp7\core\App;
use cursophp7\core\Router;
use cursophp7\app\utils\MyLog;
use cursophp7\app\utils\MyMail;
use cursophp7\app\repository\UsuarioRepository;

require __DIR__. '/../vendor/autoload.php';


$config = require_once __DIR__ . '/../app/config.php';
App::bind('config', $config);

$router=Router::load(__DIR__ . '/../app/' . $config['routes']['filename']);
App::bind('router', $router);

$logger = MyLog::load(__DIR__ . '/../logs/' . $config['logs']['filename']);
App::bind('logger',$logger);

$mail = MyMail::load($config['correo']);
App::bind('mail',$mail);

if(isset($_SESSION['loguedUser']))
$appUser = app::getRepository(UsuarioRepository::class)->find($_SESSION['loguedUser']);
else
    $appUser = null;

App::bind('appUser', $appUser);
