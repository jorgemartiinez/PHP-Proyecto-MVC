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

	public function guarda(ImagenGaleria $imagenGaleria){
		
		$fnGuardaImagen = function () use ($imagenGaleria)
		{
			$categoria = $this->getCategoria($imagenGaleria);

			$categoriaRepository = new CategoriaRepository();
			$categoriaRepository->nuevaImagen($categoria);

			$this->save($imagenGaleria);
		};

		$this->executeTransaction($fnGuardaImagen);
	}


}