<?php

if (! function_exists('renderView')) {
    /**
     * Require a view.
     *
     * @param  string $name
     * @param  array  $data
     */
    function renderView($view = null, $data = [])
    {
        list($folder, $file) = explode('.', $view);

        extract($data);

        return require "app".DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."{$folder}".DIRECTORY_SEPARATOR."{$file}.view.php";
    }
}

if (!  function_exists('redirectTo')) {
    /**
     * Redirect to a new page.
     *
     * @param  string $path
     */
    function redirectTo($path = '/')
    {
        header("Location: /{$path}");
    }
}