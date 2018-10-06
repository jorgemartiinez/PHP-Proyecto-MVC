<?php
ini_set('display_errors',1);

function esActiva($paginaAComprobar){

	$paginaActual = $_SERVER["REQUEST_URI"];
	return (strpos($paginaActual, $paginaAComprobar))?"active":"lien";
};

function tresElementos($arrayRecibido){
	shuffle($arrayRecibido);
	$arrayRecibido=array_chunk($arrayRecibido, 3)[0];
	return $arrayRecibido;	
}
?>