<?php
return [
	'database' => [
		'name' => 'cursphp7',
		'username' => 'jorge',
		'password' => '1234',
		'connection' => 'mysql:host=mysql', //mysql clase - localhost casa
		'options'=>[PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_PERSISTENT => true
	]
]	
];