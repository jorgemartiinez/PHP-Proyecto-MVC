<?php
namespace cursophp7\app\exceptions;
use Exception;
use cursophp7\app\exceptions\AppException;

class QueryException extends AppException{
    public function __construct(string $message, $code = 500)
    {
        parent::__construct($message, $code);
    }
}