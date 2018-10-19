<?php
ini_set('display_errors',1);
require_once __DIR__ . '/../../utils/utils.php';
require_once __DIR__ . '/../../utils/file.php';
require_once  __DIR__ . '/../../exceptions/FileException.php';
require_once  __DIR__ . '/../../exceptions/AppException.php';
require_once  __DIR__ . '/../../exceptions/QueryException.php';
require_once  __DIR__ . '/../../exceptions/ValidationException.php';
require_once  __DIR__ . '/../../entity/ImagenGaleria.php';
require_once  __DIR__ . '/../../entity/Categoria.php';
require_once  __DIR__ . '/../../database/Connection.php';
require_once  __DIR__ . '/../../repository/ImagenGaleriaRepository.php';
require_once  __DIR__ . '/../../repository/CategoriaRepository.php';
require_once __DIR__ . '/../../database/QueryBuilder.php';
require_once  __DIR__ . '/../../core/App.php';

$errores=[];
$descripcion="";
$mensaje ="";
try{
	$imgRepository = new ImagenGaleriaRepository();
	$categoriaRepository = new CategoriaRepository();

	$imagenes = $imgRepository->findAll();
	$categorias = $categoriaRepository->findAll();

}catch(QueryException $queryException){
	$errores[] = $queryException->getMessage();
}catch(QueryException $appException){
	$errores[] = $appException->getMessage();
}
require __DIR__ . '/../views/galeria.view.php';
