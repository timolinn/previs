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
        // suppress notice incase no dot was found in the string
        @list($folder, $file) = explode('.', $view);

        extract($data);
        // die($folder);

        // if the $view parameter is not separated with a dot, this means the view file
        // is not in a folder. Therfore the folder name should be treated as the filename
        require "app".DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR.
                    ($file ? $folder.DIRECTORY_SEPARATOR.$file : $folder) .".view.php";
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