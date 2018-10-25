<?php
namespace cursophp7\app\controllers;

ini_set('display_errors',1);

use cursophp7\core\App;
use cursophp7\app\utils\Utils;
use cursophp7\app\exceptions\FileException;
use cursophp7\app\exceptions\QueryException;
use cursophp7\app\repository\AssociatRepository;
use cursophp7\app\exceptions\ValidationException;
use cursophp7\app\repository\ImagenGaleriaRepository;

$imagenGaleria = [];
$errores=[];
$descripcion="";
$mensajeConfirmacion='';

try{
	$associatRepository = new AssociatRepository();
	$imagenGaleria = App::getRepository(ImagenGaleriaRepository::class)->findAll();
}
catch(FileException $fileException)
{
	$errores[] = $fileException->getMessage();
}
catch(QueryException $queryException){
	$errores[] = $queryException->getMessage();
}catch(ValidationException $validationException){
	$errores[] = $validationException->getMessage();
}

$categorias = ['category1'=>1,'category2'=>0,'category3'=>0];

$asociados = $associatRepository->findAll();

require __DIR__ . '/../views/index.view.php';

?>