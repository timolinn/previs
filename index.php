<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use App\Models\User;

// Load the environment variables from .env file
$env = new Dotenv\Dotenv(__DIR__);
$env->load();

// Bootstrap app
require 'src/bootstrap.php';

// $config = include 'src/config/database.php';

$user = User::where('id', '=', 1);
var_dump($user);exit;

$results = DB::select('select * from users where id = ?', array(1));
var_dump($results);
