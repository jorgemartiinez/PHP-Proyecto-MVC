<?php

require_once __DIR__ .'/../database/QueryBuilder.php';

class CategoriaRepository extends QueryBuilder
{

	/**
	 * Class Constructor
	 */
	public function __construct(string $table='categorias', string $classEntity='Categoria')
	{
		parent::__construct($table, $classEntity);
	}

	public function nuevaImagen(Categoria $categoria){
		$categoria->setNumImagenes($categoria->getNumImagenes()+1);
		$this->update($categoria);
	}

}