<?php

namespace PDC;

use Illuminate\Database\Capsule\Manager as Capsule;

class Connection
{

    public static function make($config)
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


        // Make this DB instance available globally via static methods
        $capsule->setAsGlobal();

        // Initailize ELoquent ORM
        $capsule->bootEloquent();

        // get connection
        $capsule->getConnection();

        return $capsule;
    }
}