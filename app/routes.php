<?php
namespace cursophp7\app;

ini_set('display_errors',1);


$router->get('','PagesController@index');
$router->get('about','PagesController@about');
$router->get('asociados','AsociadosController@asociado');
$router->get('blog','PagesController@blog');
$router->get('contact','PagesController@contact');
$router->get('imagenes-galeria','ImagenGaleriaController@galeria');
$router->get('imagenes-galeria/:id','ImagenGaleriaController@show');
$router->get('post','PagesController@post');
$router->post('imagenes-galeria/nueva','ImagenGaleriaController@guardaImagen');
$router->post('asociados/nueva','AsociadosController@guardaAsociado');

$router->get('login','AuthController@login');
$router->post('check-login','AuthController@checkLogin');

$router->get('logout','AuthController@logout');

