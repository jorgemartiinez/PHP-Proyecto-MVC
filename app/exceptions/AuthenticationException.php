<?php

namespace cursophp7\app\exceptions;

use cursophp7\app\exceptions\AppException;

class AuthenticationException extends AppException{
    
    public function __construct(string $message, $code = 403)
    {
        parent::__construct($message, $code);
    }

}