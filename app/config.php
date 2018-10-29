<?php
namespace cursophp7\app;

use PDO;
use Monolog\Logger;

return [
	'database' => [
		'name' => 'cursphp7',
		'username' => 'jorge',
		'password' => '1234',
		'connection' => 'mysql:host=mysql', //mysql clase - localhost casa
		'options'=>[
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_PERSISTENT => true
		]
	],
	'logs' => [
		'filename' => 'curso.log',
		'level' => Logger::INFO
	],
	'routes' => [
		'filename' => 'routes.php'
	],
	'project' => [
		'namespace' => 'cursophp7',
	],
	'correo' => [
		'smtp_server' => 'smtp.gmail.com',
		'smtp_port' => 587,
		'smtp_security' => 'tls',
		'username' => 'jorgemartiinez19@gmail.com',
		'password' => '',
		/*'email' => 'jorgemartiinez19@gmail.com',*/
		'name' => 'Jorge'
	]	
];