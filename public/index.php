<?php 
ini_set('display_errors',1);

use cursophp7\core\App;
use cursophp7\core\Request;
use cursophp7\app\exceptions\NotFoundException;

try{
	require __DIR__ . '/../core/bootstrap.php';

	App::get('router')->direct(Request::uri(), Request::method()); 

}catch(NotFoundException $notFoundException){
	die($notFoundException->getMessage());
}	
catch(AppException $appException){
	die($notFoundException -> getMessage());
}