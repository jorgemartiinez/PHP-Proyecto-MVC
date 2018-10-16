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
require_once  __DIR__ .'/repository/AssociatRepository.php';
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
	$associatRepository = new AssociatRepository();

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


$asociados = $associatRepository->findAll();

include __DIR__ . '/utils/utils.php';
require 'views/index.view.php';

?>