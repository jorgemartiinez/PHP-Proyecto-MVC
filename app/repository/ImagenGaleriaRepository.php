<?php
namespace cursophp7\app\repository;

use cursophp7\app\entity\Categoria;
use cursophp7\app\entity\ImagenGaleria;
use cursophp7\core\database\QueryBuilder;
use cursophp7\app\repository\CategoriaRepository;

class ImagenGaleriaRepository extends QueryBuilder
{

	/**
	 * Class Constructor
	 */
	public function __construct(string $table='imagenes', string $classEntity=ImagenGaleria::class)
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