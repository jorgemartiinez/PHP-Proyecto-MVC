<?php
namespace cursophp7\app;

ini_set('display_errors',1);


$router->get('','PagesController@index');
$router->get('about','PagesController@about');
$router->get('asociados','AsociadosController@asociado');
$router->get('blog','PagesController@blog');
$router->get('contact','PagesController@contact');
$router->get('imagenes-galeria','ImagenGaleriaController@galeria');
$router->get('post','PagesController@post');
$router->post('imagenes-galeria/nueva','ImagenGaleriaController@guardaImagen');
$router->post('asociados/nueva','AsociadosController@guardaAsociado');

