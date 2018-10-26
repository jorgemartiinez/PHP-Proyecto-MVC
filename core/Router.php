<?php
namespace cursophp7\core;

use cursophp7\app\exceptions\NotFoundException;

ini_set('display_errors', 1);

class Router
{
	private $routes;

	private function __construct()
	{
		$this->routes = [
			'GET' => [],
			'POST' => []
		];
	}


	public static function load(string $file)
	{
		$router = new Router();

		require $file;

		return $router;
	}

	public function get(string $uri, string $controller) : void
	{
		$this->routes['GET'][$uri] = $controller;
	}

	public function post(string $uri, string $controller) : void
	{
		$this->routes['POST'][$uri] = $controller;
	}


	public function redirect(string $uri)
	{
		header('location: /' . $uri);
	}

	private function callAction(string $controller, string $action)
	{
		$controller = App::get('config')['project']['namespace'] . '\\app\\controllers\\' . $controller;
		
		$objController = new $controller();

		if(!method_exists($objController, $action))
		throw new NotFoundException("el controlador $controller no responde al action $action");
		
		$objController->$action();
	}


	public function direct(string $uri, string $method) : void
	{
		if (!array_key_exists($uri, $this->routes[$method]))

			throw new NotFoundException("No se ha definido la ruta para la uri");

		list($controller, $action) = explode('@', $this->routes[$method][$uri]);

		$this->callAction($controller, $action);
	}
}