<?php

namespace App\Models;

use App\Models\User;

class Auth
{
    protected $auth;

    public function __construct()
    {
        $this->auth = app('authfactory')->newInstance();
    }

    /**
     * checks if user is logged in
     *
     * @return boolean
     */
    public static function check()
    {
        // AUra.Auth auth factory manager
        return app('authfactory')->newInstance()->isValid();
    }

    /**
     * Gets logged in user ID from the session
     *
     * @return mixed|integer|null
     */
    public static function id()
    {
        if (static::check())
            return app('authfactory')->newInstance()->getUserData()['user_id'];

        return null;
    }

    public static function username()
    {
        return app('authfactory')->newInstance()->getUserData()['uname'];
    }

    /**
     * gets instance of logged in user
     *
     * @return User
     */
    public static function user()
    {
        return User::find(static::id());
    }

}