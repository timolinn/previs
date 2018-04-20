<?php

namespace PDC;

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Auth\Verifier\PasswordVerifier;

class Connection
{

    public static function make(array $config)
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => $config['dbdriver'],
            'host'      => $config['dbhost'],
            'database'  => $config['dbname'],
            'username'  => $config['dbuser'],
            'password'  => $config['dbpass'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        return $capsule;
    }

    public function getPDO()
    {
        // resolve the config class from the container and get database config array
        $config = app('config')->get('database');

        $pdo = (new \PDO("mysql:host={$config['dbhost']};dbname={$config['dbname']}", $config['dbuser'], $config['dbpass']));
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;

    }

    public function getAuraPDOAdapter()
    {
        $pass = new PasswordVerifier(PASSWORD_BCRYPT);
        $cols = array(
            'email',
            'password',
            'email AS email',
            'first_name AS firstname',
            'last_name AS lastname',
            'user_name AS uname',
            'id AS user_id'
        );
        $from = 'users';
        $adapter = app('authfactory')->newPdoAdapter($this->getPDO(), $pass, $cols, $from);

        return $adapter;
    }
}