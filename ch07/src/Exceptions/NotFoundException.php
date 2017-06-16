<?php

namespace Bookstore\Exceptions;

use Exception;

class NotFoundException extends Exception 
{
    public function __construct($message = null) 
    {
        $this->message = $message ?? 'Not Found!';
        parent::__construct($this->message);
    }
}
