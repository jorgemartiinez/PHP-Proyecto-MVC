<?php
namespace cursophp7\app\exceptions;
use Exception;
use cursophp7\app\exceptions\AppException;

class NotFoundException extends AppException{
    public function __construct(string $message, $code = 404)
    {
        parent::__construct($message, $code);
    }
}