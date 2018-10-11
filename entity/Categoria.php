<?php

require_once __DIR__ . '/../database/IEntity.php';

class Categoria implements IEntity
{

	private $id;
	private $nombre;
	private $numImagenes;


	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $nombre   
	 * @param    $numImagenes   
	 */
	public function __construct(string $nombre='', int $numImagenes=0)
	{
		$this->id = null;
		$this->nombre = $nombre;
		$this->numImagenes = $numImagenes;
	}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
    	$this->id = $id;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
    	return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
    	$this->nombre = $nombre;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getNumImagenes()
    {
    	return $this->numImagenes;
    }

    /**
     * @param mixed $numImagenes
     *
     * @return self
     */
    public function setNumImagenes($numImagenes)
    {
    	$this->numImagenes = $numImagenes;

    	return $this;
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'numImagenes' => $this->getNumImagenes()
        ];
    }

}