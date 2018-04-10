<?php

$config = require 'src/config/database.php';

$con = new \ArrayObject($config, \ArrayObject::ARRAY_AS_PROPS);
var_export($con->dbpass);

// Dotenv
// illuminate/route
// Illuminate container
// Eloquent Orm
// Migrations and DB seeder