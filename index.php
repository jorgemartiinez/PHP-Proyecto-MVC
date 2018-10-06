<?php
ini_set('display_errors',1);
require 'entity/ImagenGaleria.php';
require 'entity/Associat.php';

$imagenGaleria = [];

for ($i=1; $i < 13 ; $i++) { //Bucle para crear las imágenes.
	$imagenGaleria[$i] = new ImagenGaleria("{$i}.jpg","descripcion imagen {$i}", rand(10,100), rand(30,120), rand(50,150));
}


$categorias = ['category1'=>1,'category2'=>0,'category3'=>0];

$asociado1=new Associat("Ignacio","images/index/associats/log1.jpg","Descripcion 1");
$asociado2=new Associat("Jonathan","images/index/associats/log2.jpg", "Descripcion 2");
$asociado3=new Associat("Adrián","images/index/associats/log3.jpg","Descripcion 3");
$asociado4=new Associat("Mauro","images/index/associats/log2.jpg","Descripcion 4");
$asociado5=new Associat("Jorge","images/index/associats/log3.jpg","Descripcion 5");

$asociados = array($asociado1, $asociado2,$asociado3,$asociado4,$asociado5);


include __DIR__ . '/utils/utils.php';
require 'views/index.view.php';

?>