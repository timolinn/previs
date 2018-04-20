<?php

namespace App\Services\Session;

use Aura\Auth\Session\Segment;

class Session
{
    public static function set($key, $val)
    {
        return app('session')->set($key, $val);
    }

    public static function get($key, $val)
    {
        return app('session')->get($key, $val);
    }

    public static function errors()
    {

    }

    public static function success($message)
    {
        return app('session')->set('success', $message);
    }

    public static function error($message)
    {
        return app('session')->set('error', $message);
    }
}
