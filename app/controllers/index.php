<?php
namespace cursophp7\app\controllers;

use cursophp7\core\App;
use cursophp7\app\exceptions\QueryException;
use cursophp7\app\repository\AssociatRepository;
use cursophp7\app\repository\ImagenGaleriaRepository;

ini_set('display_errors',1);


$imagenGaleria = [];
$errores=[];
$descripcion="";
$mensajeConfirmacion='';

try{
	$imagenGaleria = App::getRepository(ImagenGaleriaRepository::class)->findAll();
	$asociados = App::getRepository(AssociatRepository::class)->findAll();
	$categorias = ['category1'=>1,'category2'=>0,'category3'=>0];

}catch(QueryException $queryException){
	$errores[] = $queryException->getMessage();
}

require __DIR__ . '/../views/index.view.php';

?>