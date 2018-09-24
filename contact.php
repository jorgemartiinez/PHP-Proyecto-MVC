<?php

$problemas = [];
$cadenaErrores ="";

if(isset($_POST['boton']))
{
	$nombre = trim(htmlspecialchars($_POST['nombre']));
	$apellido = trim(htmlspecialchars($_POST['apellido']));
	$asunto = trim(htmlspecialchars($_POST['asunto']));
	$mensaje = trim(htmlspecialchars($_POST['mensaje']));
	$email = trim(htmlspecialchars($_POST["email"]));
	
	if(!empty($nombre) && !empty($asunto) && !empty($email))
	{
		$nombre= $nombre;
		$apellido= $apellido;
		
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email = $email;
		}else{
			$email = "El email introducido no es correcto";
		}
		$asunto= $asunto;
		$mensaje= $mensaje;

	}else{
		
		if(empty($nombre)){
			array_push($problemas, "No has introducido el nombre");
		}if(empty($asunto)){
			array_push($problemas, "No has introducido el asunto");
		}if(empty($email)){
			array_push($problemas, "No has introducido el email");
		}
		$cadenaErrores=implode("<br/>",$problemas); 
	}
}

include __DIR__ . '/utils/utils.php';
require 'views/contact.view.php';

?>

