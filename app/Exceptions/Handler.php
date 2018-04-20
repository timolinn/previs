<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($e)
    {
        // if
      if ("Aura\Auth\Exception\UsernameMissing" == get_class($e->getPrevious())) {

            $e->setMessage("The 'email' field is missing or empty.");

        } elseif ("Aura\Auth\Exception\PasswordMissing" == get_class($e->getPrevious())) {

            $e->setMessage("The 'password' field is missing or empty.");

        } elseif ("Aura\Auth\Exception\UsernameNotFound" == get_class($e->getPrevious())) {

            $e->setMessage("The email you entered was not found.");

        } elseif ("Aura\Auth\Exception\MultipleMatches" == get_class($e->getPrevious())) {

            $e->setMessage("There is more than one account with that email.");

        } elseif ("Aura\Auth\Exception\PasswordIncorrect" == get_class($e->getPrevious())) {

            $e->setMessage("The password you entered was incorrect.");

        } elseif ("Aura\Auth\Exception\ConnectionFailed" == get_class($e->getPrevious())) {

            $e->setMessage("Cound not connect to IMAP or LDAP server.");

        } elseif ("Aura\Auth\Exception\BindFailed" == get_class($e->getPrevious())) {

            $e->setMessage("Cound not bind to LDAP server.");

        } elseif (InvalidLoginException == get_class($e->getPrevious())) {

            $e->setMessage("Invalid login details. Please try again.");

        }
        return $e;
    }
}
