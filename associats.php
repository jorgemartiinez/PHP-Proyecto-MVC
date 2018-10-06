<?php
ini_set('display_errors',1);
require_once __DIR__ . '/utils/utils.php';
require_once __DIR__ . '/utils/file.php';
require_once  __DIR__ .'/exceptions/FileException.php';
require_once  __DIR__ .'/entity/Associat.php';

$errores=[];
$descripcion="";
$mensajeConfirmacion='';
$nombre = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$nombre = trim(htmlspecialchars($_POST['nombre']));
	if(empty($nombre)){
		$mensajeConfirmacion = 'No se han podido enviar las imagenes. Nombre es obligatorio';
	}
	else{
		try{

			$tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
			$imagen = new File("imagen", $tiposAceptados);

			$imagen->saveUploadFile(Associat::RUTA_IMAGENES_ASOCIADOS);

			$descripcion = trim(htmlspecialchars($_POST['descripcion']));

			$mensajeConfirmacion = 'Datos Enviados';
		}
		catch(FileException $fileException)
		{
			$errores[] = $fileException->getMessage();
		}
	}
}
require 'views/associats.view.php';
