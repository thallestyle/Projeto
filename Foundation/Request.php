<?php
namespace Foundation;

final class Request
{
    public static function dispatch($page, $action)
    {
        if( ! isset($page))
        {
            throw new \Exception('É preciso informar a página.');
        }

        $name = ucwords(strtolower($page)) . 'Controller';
        $class = 'App\Controllers\\' . $name;

        $controller = new $class;
        $controller->$action();
    }
}
