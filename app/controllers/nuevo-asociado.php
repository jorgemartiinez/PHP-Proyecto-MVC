<?php
namespace cursophp7\app\controllers;
ini_set('display_errors',1);

use cursophp7\core\App;

use cursophp7\app\utils\File;
use cursophp7\app\entity\Associat;
use cursophp7\app\entity\FileException;
use cursophp7\app\entity\QueryException;
use cursophp7\app\entity\ValidationException;
use cursophp7\app\repository\AssociatRepository;

$errores=[];
$descripcion="";
$mensajeConfirmacion='';
$nombre = "";

try{
	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$nombre = trim(htmlspecialchars($_POST['nombre']));

		$tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
		$imagen = new File("imagen", $tiposAceptados);

		$imagen->saveUploadFile(Associat::RUTA_IMAGENES_ASOCIADOS);

		$descripcion = trim(htmlspecialchars($_POST['descripcion']));

		$associat = new Associat($nombre,$imagen->getFileName(), $descripcion);

        App::getRepository(AssociatRepository::class)->guarda($associat);

		$mensajeConfirmacion = 'Datos Enviados';

		$associats =  App::getRepository(AssociatRepository::class)->findAll();

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

App::get('router')->redirect('asociados');