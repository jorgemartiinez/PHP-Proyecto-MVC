<?php
ini_set('display_errors',1);



$router->get('','app/controllers/index.php');
$router->get('about','app/controllers/about.php');
$router->get('asociados','app/controllers/associats.php');
$router->get('blog','app/controllers/blog.php');
$router->get('contact','app/controllers/contact.php');
$router->get('imagenes-galeria','app/controllers/galeria.php');
$router->get('post','app/controllers/single_post.php');
$router->post('imagenes-galeria/nueva','app/controllers/nueva-imagen-galeria.php');
