<?php

$config = include 'config/database.php';

use PDC\Connection;

$db = Connection::make($config);
