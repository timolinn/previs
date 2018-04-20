<?php

namespace App\Exceptions;

use Exception;

class InvalidLoginException extends Exception
{
    protected $context;

    protected $message;

    public function __construct($message, $code = 0, $previous = '', $context = '')
    {
      $this->context = $context;

      parent::__construct($message, $code, $previous);

      Handler::render($this);
    }

    public function getExceptionContext()
    {
      return $this->context;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
}
