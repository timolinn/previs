<?php

namespace App\Services;


class Session
{
    public static function set($key, $val)
    {
        return app('session')->set($key, $val);
    }

    public static function get($key, $val = null)
    {
        return app('session')->get($key, $val);
    }

    public static function flash($key, $val)
    {
        return app('session')->setFlash($key, $val);
    }

    public static function getFlash($key)
    {
        // app('session')->clear();
        return app('session')->getFlash($key);
    }

    public static function errors()
    {

    }

    public static function success($message)
    {
        return app('session')->setFlash('success', $message);
    }

    public static function error($message)
    {
        return app('session')->setFlash('error', $message);
    }
}
