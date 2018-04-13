<?php

require 'vendor/autoload.php';

// Boot up the app
require 'src/app/bootstrap.php';


// Enable Facades
\Illuminate\Support\Facades\Facade::setFacadeApplication($app);

// initiate route
PDC\Router::load(new PDC\Request())
            ->sendResponse();
