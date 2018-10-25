<?php
namespace cursophp7\core;

use cursophp7\app\exceptions\NotFoundException;
ini_set('display_errors',1);

class Router
{
	private $routes;

	private function __construct()
	{
		$this->routes = [
			'GET' => [],
			'POST'=>[]
		];
	}


	public static function load(string $file)
	{
		$router = new Router();
		
		require $file;

		return $router;
	}

	public function get(string $uri, string $controller):void
	{
		$this->routes['GET'][$uri] = $controller;
	}

	public function post(string $uri, string $controller):void
	{
		$this->routes['POST'][$uri] = $controller;
	}


	public function redirect(string $uri){
		header('location: /'.$uri);
	}


	public function direct(string $uri, string $method): string
	{
		if(array_key_exists($uri, $this->routes[$method]))
			return $this->routes[$method][$uri];

		throw new NotFoundException("No se ha definido la ruta para la uri");
		
	}

}