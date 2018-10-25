<?php
namespace cursophp7\app\repository;

use cursophp7\app\entity\Associat;
use cursophp7\core\database\QueryBuilder;

class AssociatRepository extends QueryBuilder
{

	/**
	 * Class Constructor
	 */
	public function __construct(string $table='asociados', string $classEntity=Associat::class)
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