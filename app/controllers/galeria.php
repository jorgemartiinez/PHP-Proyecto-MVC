<?php
namespace cursophp7\app\controllers;

ini_set('display_errors',1);

use cursophp7\core\App;
use cursophp7\app\exceptions\AppException;
use cursophp7\app\exceptions\QueryException;
use cursophp7\app\repository\CategoriaRepository;
use cursophp7\app\repository\ImagenGaleriaRepository;

$errores=[];
$descripcion="";
$mensaje ="";

try{
	$imagenes = App::getRepository(ImagenGaleriaRepository::class)->findAll();
	$categorias =  App::getRepository(CategoriaRepository::class)->findAll();
}catch(QueryException $queryException){
	$errores[] = $queryException->getMessage();
}catch(AppException $appException){
	$errores[] = $appException->getMessage();
}
require __DIR__ . '/../views/galeria.view.php';
