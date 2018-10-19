<?php
ini_set('display_errors',1);

require_once __DIR__ . '/../../utils/utils.php';
require_once __DIR__ . '/../../utils/file.php';
require_once  __DIR__ . '/../../exceptions/FileException.php';
require_once  __DIR__ . '/../../entity/Associat.php';
require_once  __DIR__ . '/../../exceptions/AppException.php';
require_once  __DIR__ . '/../../exceptions/QueryException.php';
require_once  __DIR__ . '/../../exceptions/ValidationException.php';
require_once  __DIR__ . '/../../entity/ImagenGaleria.php';
require_once  __DIR__ . '/../../entity/Categoria.php';
require_once  __DIR__ . '/../../database/Connection.php';
require_once  __DIR__ . '/../../repository/AssociatRepository.php';
require_once  __DIR__ . '/../../database/QueryBuilder.php';
require_once  __DIR__ . '/../../core/App.php';

$errores=[];
$descripcion="";
$mensajeConfirmacion='';
$nombre = "";


try{
	
	$associatRepository = new AssociatRepository();

	$associats = $associatRepository->findAll();

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$nombre = trim(htmlspecialchars($_POST['nombre']));

		$tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
		$imagen = new File("imagen", $tiposAceptados);

		$imagen->saveUploadFile(Associat::RUTA_IMAGENES_ASOCIADOS);

		$descripcion = trim(htmlspecialchars($_POST['descripcion']));

		$associat = new Associat($nombre,$imagen->getFileName(), $descripcion);

		$associatRepository->guarda($associat);

		$mensajeConfirmacion = 'Datos Enviados';

		$associats = $associatRepository->findAll();

	}
}
catch(FileException $fileException)
{
	$errores[] = $fileException->getMessage();
}
catch(QueryException $queryException){
	$errores[] = $queryException->getMessage();
}catch(QueryException $appException){
	$errores[] = $appException->getMessage();
}catch(ValidationException $validationException){
	$errores[] = $validationException->getMessage();
}
require __DIR__ . '/../views/associats.view.php';
