<?php

$app->make('router')->get('/', function() {
    // Because 'Hello, World!' is too mainstream
    return 'Are you looking for me ?';
});