<?php

namespace Bookstore\Exceptions;

use Exception;

class NotFoundException extends Exception 
{
    public function __construct($message = null) 
    {
        $message ?? 'Not Found!';
        parent::__construct($message);
    }
}
