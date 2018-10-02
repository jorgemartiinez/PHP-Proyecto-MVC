<?php
ini_set('display_errors',1);
require 'entity/ImagenGaleria.php';

$imagenGaleria1 = new ImagenGaleria("1.jpg", "descripcion imagen 1", 143, 43, 100);
$imagenGaleria2 = new ImagenGaleria("2.jpg", "descripcion imagen 2", 224, 26,84);
$imagenGaleria3 = new ImagenGaleria("3.jpg", "descripcion imagen 3", 362, 87, 94);
$imagenGaleria4 = new ImagenGaleria("4.jpg", "descripcion imagen 4", 535, 18, 24);
$imagenGaleria5 = new ImagenGaleria("5.jpg", "descripcion imagen 5", 265, 94, 54);
$imagenGaleria6 = new ImagenGaleria("6.jpg", "descripcion imagen 6", 643, 76, 64);
$imagenGaleria7 = new ImagenGaleria("7.jpg", "descripcion imagen 7", 265, 25, 84);
$imagenGaleria8 = new ImagenGaleria("8.jpg", "descripcion imagen 8", 443, 93, 44);
$imagenGaleria9 = new ImagenGaleria("9.jpg", "descripcion imagen 9", 643, 56, 44);
$imagenGaleria10 = new ImagenGaleria("10.jpg", "descripcion imagen 10", 376, 19, 34);
$imagenGaleria11 = new ImagenGaleria("11.jpg", "descripcion imagen 11", 32, 25, 164);
$imagenGaleria12 = new ImagenGaleria("12.jpg", "descripcion imagen 12",765, 27, 764);

$categorias = ['category1'=>1,'category2'=>0,'category3'=>0];

$imagenGaleria = array($imagenGaleria1, $imagenGaleria2, $imagenGaleria3, $imagenGaleria4, $imagenGaleria5, $imagenGaleria6, $imagenGaleria7, $imagenGaleria8, $imagenGaleria9, $imagenGaleria10, $imagenGaleria11, $imagenGaleria12);


include __DIR__ . '/utils/utils.php';
require 'views/index.view.php';

?>