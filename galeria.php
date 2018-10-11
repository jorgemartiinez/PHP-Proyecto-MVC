<?php
ini_set('display_errors',1);
require_once __DIR__ . '/utils/utils.php';
require_once __DIR__ . '/utils/file.php';
require_once  __DIR__ .'/exceptions/FileException.php';
require_once  __DIR__ .'/exceptions/AppException.php';
require_once  __DIR__ .'/exceptions/QueryException.php';
require_once  __DIR__ .'/entity/ImagenGaleria.php';
require_once  __DIR__ .'/entity/Categoria.php';
require_once  __DIR__ .'/database/Connection.php ';
require_once  __DIR__ .'/repository/ImagenGaleriaRepository.php';
require_once  __DIR__ .'/repository/CategoriaRepository.php';
require_once  __DIR__ .'/database/QueryBuilder.php ';
require_once  __DIR__ .'/core/App.php ';
$errores=[];
$descripcion="";
$mensajeConfirmacion='';

try{
	$config = require_once 'app/config.php';
	App::bind('config', $config);
	$imgRepository = new ImagenGaleriaRepository();
	$categoriaRepository = new CategoriaRepository();
	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
		$imagen = new File("imagen", $tiposAceptados);

		$imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
		
		$imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
		
		$descripcion = trim(htmlspecialchars($_POST['descripcion']));
		
		$categoria = trim(htmlspecialchars($_POST['categoria']));
		
		if(empty($categoria)){
			throw new ValidationException("No se ha recibido la categoria");
		}

		$imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);

		$imgRepository->save($imagenGaleria);
		$mensajeConfirmacion = 'Datos Enviados';

	}
	$imagenes = $imgRepository->findAll();
	$categorias = $categoriaRepository->findAll();

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
require 'views/galeria.view.php';
