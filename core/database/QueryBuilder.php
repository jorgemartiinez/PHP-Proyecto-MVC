<?php

namespace cursophp7\core\database;

use PDO;
use cursophp7\core\App;
use cursophp7\core\database\QueryBuilder;

abstract class QueryBuilder{
	/**
	* @var PDO
	*/

	private $connection;
	private $table;
	private $classEntity;

	public function __construct(string $table,string $classEntity ){
		$this->connection = App::getConnection();
		$this->table = $table;
		$this->classEntity = $classEntity;
	}


	public function findAll() : array{
		$sql = "SELECT * from $this->table";
		
		return $this->executeQuery($sql);
	}

	public function save(IEntity $entity) : void {
		try{
			$parameters = $entity -> toArray();	
			$sql = sprintf(
				'insert into %s (%s) values (%s)',
				$this->table,
				implode(', ', array_keys($parameters)),':'.implode(', :', array_keys($parameters))
			);
			$statement = $this->connection->prepare($sql);

			$statement->execute($parameters);
		}catch(PDOException $exception){
			throw new QueryException("Error al insertar en la base de datos");

		}
	}

	private function executeQuery(string $sql){
		
		$pdoStatement = $this->connection->prepare($sql);

		if($pdoStatement->execute() === false){
			throw new QueryException("No se ha podido ejecutar la query solicitada");
		}

		return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
	}

	public function find(int $id){
		$sql = "SELECT * from $this->table WHERE id='$id'";

		$result = $this->executeQuery($sql);
		
		if(empty($result)){
			throw new NotFoundException("No se ha encontrado ningún elemento con id $id");
		}

		return $result[0];
	}


	public function getUpdate($parameters){
		$updates = '';

		foreach ($parameters as $key => $value) {
			
			if($key !== 'id')
			{
				if ($updates !=='') 
					$updates .= ', ';
				$updates .= $key . '=:' . $key;
			}
		}
		return $updates;
	}

	public function update(IEntity $entity):void {

		try{
			$parameters = $entity -> toArray();

			$sql = sprintf(
				'UPDATE %s SET %s WHERE id=:id',
				$this->table,
				$this->getUpdate($parameters)
			);

			$statement = $this->connection->prepare($sql);
			$statement->execute($parameters);
		}catch(PDOException $pdoException){
			throw new QueryException("Error al actualizar el elemento con id".$parameters['id']);
		}
	}

	public function executeTransaction (callable $fnExecuteQuerys){

		try{
			$this->connection->beginTransaction();

			$fnExecuteQuerys();

			$this->connection->commit();

		}catch(PDOException $pdoException){

			$this->connection->rollBack();

			throw new QueryException("No se ha podido realizar la operación");

		}

	}


}
