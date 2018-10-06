<?php
ini_set('display_errors',1);
require_once __DIR__ . '/utils/utils.php';
require_once __DIR__ . '/utils/file.php';
require_once  __DIR__ .'/exceptions/FileException.php';
require_once  __DIR__ .'/entity/ImagenGaleria.php';

$errores=[];
$descripcion="";
$mensajeConfirmacion='';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	try{

		$tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
		$imagen = new File("imagen", $tiposAceptados);

		$imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
		

		$imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
		

		$descripcion = trim(htmlspecialchars($_POST['descripcion']));

		$mensajeConfirmacion = 'Datos Enviados';
	}
	catch(FileException $fileException)
	{
		$errores[] = $fileException->getMessage();
	}
}


require 'views/galeria.view.php';
