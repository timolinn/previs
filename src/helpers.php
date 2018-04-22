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
        // die(__DIR__);

        // if the $view parameter is not separated with a dot, this means the view file
        // is not in a folder. Therfore the folder name should be treated as the filename
        $filePath = realpath(
            __DIR__ . "/../app".DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR.
                   ($file ? $folder.DIRECTORY_SEPARATOR.$file : $folder) .".view.php"
       );

       if ($filePath) {
           $require = require $filePath;

           if (!$require) {
               trigger_error($filePath . "Path does not exist.");
           }
           return;
        }

        throw new \Exception(($file ? $folder.DIRECTORY_SEPARATOR.$file : $folder).'.view.php is invalid');


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
        // dd($path);
        header("Location: ".env('APP_URL'). "/$path");
        exit();
    }
}

if (! function_exists('assetload')) {

    function assetload($path)
    {
        return "/../". $path;
    }
}

if (! function_exists('pdcsession')) {

    function pdcsession($key)
    {
        // return $_SESSION['Aura\Session\Flash\Now']['App\Controllers\AdminController'][$key];
        return \App\Services\Session::__getFlash($key, 'message');
    }
}