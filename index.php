<?php

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use App\Models\User;

// Load the environment variables from .env file
$env = new Dotenv\Dotenv(__DIR__);
$env->load();

// Bootstrap app
require 'src/app/bootstrap.php';

if (str_is('hello', 'Hello')) {
    echo "Yes!";
}
