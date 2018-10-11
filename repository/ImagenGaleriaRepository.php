<?php

require_once __DIR__ .'/../database/QueryBuilder.php';

class ImagenGaleriaRepository extends QueryBuilder
{

	/**
	 * Class Constructor
	 */
	public function __construct(string $table='imagenes', string $classEntity='ImagenGaleria')
	{
		parent::__construct($table, $classEntity);
	}

	public function getCategoria(ImagenGaleria $imagenGaleria): Categoria
	{
		$categoriaRepository = new CategoriaRepository();
		return $categoriaRepository->find($imagenGaleria->getCategoria());
	}

}