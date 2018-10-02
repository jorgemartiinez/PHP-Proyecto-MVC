<?php
ini_set('display_errors',1);

class ImagenGaleria{
	
	const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
	const RUTA_IMAGENES_GALLERY = 'images/index/gallery/'; 
	/**
	 * @var string
	 */
	private $nombre;
		/**
	 * @var string
	 */
		private $descripcion;
		/**
	 * @var int
	 */
		private $numVisualizaciones;
		/**
	 * @var int
	 */
		private $numLikes;
		/**
	 * @var int
	 */
		private $numDownloads;


	/**
	 * Class Constructor
	 * @param string   $nombre   
	 * @param string   $descripcion   
	 * @param int   $numVisualizaciones   
	 * @param int   $numLikes   
	 * @param int   $numDownloads   
	 */
	public function __construct($nombre, $descripcion, $numVisualizaciones=0, $numLikes=0, $numDownloads=0)
	{
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->numVisualizaciones = $numVisualizaciones;
		$this->numLikes = $numLikes;
		$this->numDownloads = $numDownloads;
	}

    /**
     * @return string
     */

    public function __toString(){
    	return $this->getDescripcion();
    }

    public function getNombre()
    {
    	return $this->nombre;
    }

    /**
     * @param string $nombre
     *
     * @return self
     */
    public function setNombre($nombre): ImagenGaleria
    {
    	$this->nombre = $nombre;

    	return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
    	return $this->descripcion;
    }

    /**
     * @param string $descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion): ImagenGaleria
    {
    	$this->descripcion = $descripcion;

    	return $this;
    }

    /**
     * @return int
     */
    public function getNumVisualizaciones()
    {
    	return $this->numVisualizaciones;
    }

    /**
     * @param int $numVisualizaciones
     *
     * @return self
     */
    public function setNumVisualizaciones($numVisualizaciones): ImagenGaleria
    {
    	$this->numVisualizaciones = $numVisualizaciones;

    	return $this;
    }

    /**
     * @return int
     */
    public function getNumLikes()
    {
    	return $this->numLikes;
    }

    /**
     * @param int $numLikes
     *
     * @return self
     */
    public function setNumLikes($numLikes): ImagenGaleria
    {
    	$this->numLikes = $numLikes;

    	return $this;
    }

    /**
     * @return int
     */
    public function getNumDownloads()
    {
    	return $this->numDownloads;
    }

    /**
     * @param int $numDownloads
     *
     * @return self
     */
    public function setNumDownloads($numDownloads): ImagenGaleria
    {
    	$this->numDownloads = $numDownloads;

    	return $this;
    }

    public function getUrlPortfolio() : string
    {
    	return self::RUTA_IMAGENES_PORTFOLIO. $this->getNombre();
    }
    public function getUrlGallery() : string
    {
    	return self::RUTA_IMAGENES_GALLERY. $this->getNombre();
    }

}