<?php
namespace cursophp7\core;

use cursophp7\core\database\Connection;
use cursophp7\app\exceptions\AppException;

class App{

	private static $container = [];

	public static function bind(string $key,$value){
		static::$container[$key] = $value;

	}

	public static function get(string $key){

		if(!array_key_exists($key, static::$container)){
			throw new AppException("No se ha encontrado la clave $key en el contenedor");
		}else{
			return static::$container[$key];
		}
	}

	public static function getConnection(){
		if(!array_key_exists('connection', static::$container)){
			static::$container['connection'] = Connection::make();
		}
		return static::$container['connection'];
	}

	public static function getRepository(string $className)
	{
		if(!array_key_exists($className, static::$container))
			static::$container[$className] = new $className();		
		return static::$container[$className];
	}

}