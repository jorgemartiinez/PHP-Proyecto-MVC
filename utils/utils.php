<?php

function esActiva($paginaAComprobar){

	$paginaActual = $_SERVER["REQUEST_URI"];

	return (strpos($paginaActual, $paginaAComprobar))?"active":"lien";

};
?>