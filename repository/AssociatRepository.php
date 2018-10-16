<?php

require_once __DIR__ .'/../database/QueryBuilder.php';

class AssociatRepository extends QueryBuilder
{

	/**
	 * Class Constructor
	 */
	public function __construct(string $table='asociados', string $classEntity='Associat')
	{
		parent::__construct($table, $classEntity);
	}

	public function guarda(Associat $imagenGaleria){
		
		$fnGuardaImagen = function () use ($imagenGaleria)
		{
			$this->save($imagenGaleria);
		};

		$this->executeTransaction($fnGuardaImagen);
	}

}