<?php 
ini_set('display_errors',1);

class Associat{

    const RUTA_IMAGENES_ASOCIADOS = 'images/index/associats/';
    private $nombre;
    private $logo;
    private $descripcion;


	/**
	 * Class Constructor
	 * @param    $nombre   
	 * @param    $logo   
	 * @param    $descripcion   
	 */
	public function __construct($nombre, $logo, $descripcion)
	{
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


    public function getUrlAsociados() : string
    {
        return self::RUTA_IMAGENES_ASOCIADOS. $this->getNombre();
    }

}

?>