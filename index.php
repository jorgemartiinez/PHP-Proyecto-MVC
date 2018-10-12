<?php
ini_set('display_errors',1);
require 'entity/ImagenGaleria.php';
require 'entity/Associat.php';
require_once  __DIR__ .'/exceptions/FileException.php';
require_once  __DIR__ .'/exceptions/AppException.php';
require_once  __DIR__ .'/exceptions/QueryException.php';
require_once  __DIR__ .'/exceptions/ValidationException.php';
require_once  __DIR__ .'/entity/ImagenGaleria.php';
require_once  __DIR__ .'/entity/Categoria.php';
require_once  __DIR__ .'/database/Connection.php';
require_once  __DIR__ .'/repository/ImagenGaleriaRepository.php';
require_once  __DIR__ .'/repository/CategoriaRepository.php';
require_once  __DIR__ .'/database/QueryBuilder.php';
require_once  __DIR__ .'/core/App.php';

$imagenGaleria = [];
$errores=[];
$descripcion="";
$mensajeConfirmacion='';

try{
	$config = require_once 'app/config.php';
	App::bind('config', $config);
	$imgRepository = new ImagenGaleriaRepository();
	$imagenGaleria = $imgRepository->findAll();
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

$categorias = ['category1'=>1,'category2'=>0,'category3'=>0];

$asociado1=new Associat("Ignacio","images/index/associats/log1.jpg","Descripcion 1");
$asociado2=new Associat("Jonathan","images/index/associats/log2.jpg", "Descripcion 2");
$asociado3=new Associat("Adrián","images/index/associats/log3.jpg","Descripcion 3");
$asociado4=new Associat("Mauro","images/index/associats/log2.jpg","Descripcion 4");
$asociado5=new Associat("Jorge","images/index/associats/log3.jpg","Descripcion 5");

$asociados = array($asociado1, $asociado2,$asociado3,$asociado4,$asociado5);

include __DIR__ . '/utils/utils.php';
require 'views/index.view.php';

?>