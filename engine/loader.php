<?php

    function autoloader($class)
    {
        require_once(__DIR__ . '/'.strtolower($class).'.php');
    }

    spl_autoload_register('autoloader');

    $route = $_SERVER['REQUEST_URI'];

    if(strpos($route, '?') != false and strpos($route, '?') >= 0) {
        $route = trim(strstr($route, '?', true), '?');
    }

    $urlArray = @explode("/", $route);

    if(is_array($urlArray))
    {
        if (empty($urlArray[1]))
        {
            $urlArray[1] = "index";
        }

        if (empty($urlArray[2]))
        {
            $urlArray[2] = "index";
        }
    }
    else {
        $urlArray = array(false, 'index', 'index');
    }

    if(file_exists(__DIR__ . '/pages/'.$urlArray[1].'.php'))
        require_once(__DIR__ . '/pages/'.$urlArray[1].'.php');
    else
        require_once(__DIR__ . '/pages/404.php');