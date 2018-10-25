<?php
namespace cursophp7\app\utils;

use Exception;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class MyLog{

	private $log;

	private $level;

	/**
	 * Class Constructor
	 * @param    $log   
	 */
	private function __construct(string $filename, int $level)
	{
		$this->level = $level;
		$this->log = new Logger('name');
		$this->log->pushHandler(
			new StreamHandler($filename, $this->level)
		);
	}

	public static function load(string $filename, int $level = Logger::INFO):MyLog
	{
		return new MyLog($filename, $level);
	}

	public function add(string $message){
		$this->log->log($this->level, $message);
	}


}