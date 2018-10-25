<?php 
namespace cursophp7\app\entity;
ini_set('display_errors',1);

use cursophp7\core\database\IEntity;

class Associat implements IEntity{

    const RUTA_IMAGENES_ASOCIADOS = 'images/index/associats/';

    private $id;
    private $nombre;
    private $logo;
    private $descripcion;


	/**
	 * Class Constructor
	 * @param    $nombre   
	 * @param    $logo   
	 * @param    $descripcion   
	 */
	public function __construct($nombre="", $logo="", $descripcion="")
	{
        $this->id = null;
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
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
    public function getLogo()
    {
    	return $this->logo;
    }

    /**
     * @param mixed $logo
     *
     * @return self
     */
    public function setLogo($logo)
    {
    	$this->logo = $logo;

    	return $this;
    }



    /**
     * @return mixed
     */
    public function getDescripcion()
    {
    	return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
    	$this->descripcion = $descripcion;

    	return $this;
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

    public function getUrlAsociados() : string
    {
        return self::RUTA_IMAGENES_ASOCIADOS. $this->getLogo();
    }

    public function toArray():array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'logo'=> $this->getLogo(),
            'descripcion' => $this->getDescripcion()
        ];
    }


}

?>