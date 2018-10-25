<?php
namespace cursophp7\app\utils;
ini_set('display_errors',1);

class Utils{

	public static function esActiva($paginaAComprobar){
		$paginaActual = $_SERVER["REQUEST_URI"];
		return (strpos($paginaActual, $paginaAComprobar))?"active":"lien";
	}

	public static function tresElementos($arrayRecibido){
		shuffle($arrayRecibido);
		$arrayRecibido=array_chunk($arrayRecibido, 3)[0];
		return $arrayRecibido;	
	}
}
