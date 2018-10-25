<?php
namespace cursophp7\app\controllers;
ini_set('display_errors',1);

use cursophp7\core\App;
use cursophp7\app\entity\File;
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
	$associats = App::getRepository(AssociatRepository::class)->findAll();
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
