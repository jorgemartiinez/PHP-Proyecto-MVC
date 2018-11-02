<?php

namespace cursophp7\core;

use cursophp7\core\App;
use cursophp7\app\exceptions\NotFoundException;

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

	public static function load(string $file) : Router
	{
		$router = new Router();
		require $file;
		return $router;
	}

	public function get(string $uri, string $controller)
	{
		$this->routes['GET'][$uri] = $controller;
	}

	public function post(string $uri, string $controller)
	{
		$this->routes['POST'][$uri] = $controller;
	}

	private function callAction(string $controller, string $action, array $parameters) : bool
	{
		try {
			$controller = App::get('config')['project']['namespace'] .
				'\\app\\controllers\\' . $controller;
			$objController = new $controller();
			if (!method_exists($objController, $action))
				throw new NotFoundException(
				"El controlador $controller no responde al action $action"
			);
			call_user_func_array(array($objController, $action), $parameters);
			return true;
		} catch (TypeError $typeError) {
			return false;
		}
	}

	private function getParametersRoute(string $route, array $matches)
	{
		preg_match_all('/:([^\/]+)/', $route, $parameterNames);
		$parameterNames = array_flip($parameterNames[1]);
		return array_intersect_key($matches, $parameterNames);
	}

	private function prepareRoute(string $route) : string
	{
		$urlRule = preg_replace(
			'/:([^\/]+)/',
			'(?<\1>[^/]+)',
			$route
		);
		$urlRule = str_replace('/', '\/', $urlRule);
		return '/^' . $urlRule . '\/*$/s';
	}

	public function direct($uri, $method)
	{
		foreach ($this->routes[$method] as $route => $controller) {
			$urlRule = $this->prepareRoute($route);
			if (preg_match($urlRule, $uri, $matches) === 1) {
				$parameters = $this->getParametersRoute($route, $matches);
				list($controller, $action) = explode('@', $controller);
				if ($this->callAction($controller, $action, $parameters) === true)
					return;
			}
		}
		throw new NotFoundException('No se ha definido una ruta para esta URI');
	}

	public function redirect($path)
	{
		header('location:/' . $path);
		exit();
	}

}