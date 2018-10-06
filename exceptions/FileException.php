<?php 
ini_set('display_errors',1);

class FileException extends Exception{

	public function __constructor(string $message){

		parent::__construct($message);

	}


}