<?php

namespace Bookstore\Exceptions;

use Exception;

class InvalidIdException extends Exception 
{
    public function __construct($message = null) 
    {
        $message ?? 'Invalid id provided.';
        parent::__construct($message);
    }
}