<?php

namespace Config;

require 'app/config/Database.php';
class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'uri' => $uri,
            'controller' => $controller,
        ];
    }

    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {

            $alternativeUri = $route['uri'] . '/';

            if ($route['uri'] === $uri || $alternativeUri === $uri && $route['method'] === $method) {


                $controllerParts = explode('@', $route['controller']);
                $controllerName = $controllerParts[0];
                $methodName = $controllerParts[1];

                $controllerFile = 'app/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    require_once $controllerFile;

                    $controllerInstance = new $controllerName();

                    if (method_exists($controllerInstance, $methodName)) {
                        return $controllerInstance->$methodName();
                    } else {
                        return '404 Not Found';
                    }
                } else {
                    return '404 Not Found';
                }
            }
        }

        return '404 Not Found';
    }
}


//Alternative
// class Router
// {
//     public static function parse_url()
//     {
//         $dirname = dirname($_SERVER['SCRIPT_NAME'])
//         $dirname = $dirname != '/' ? $dirname : null; 
//         $basename = basename($_SERVER['SCRIPT_NAME']);
//         $request_uri = str_replace([$dirname, $basename], null, $_SERVER['REQUEST_URI']);
//         return $request_uri;
//     }
//     public static function run($url, $callback, $method = 'get')
//     {

//         $method = explode('|', strtoupper($method));

//         if (in_array($_SERVER['REQUEST_METHOD'], $method)) {

//             $patterns = [
//                 '{url}' => '([0-9a-zA-Z]+)',
//                 '{id}' => '([0-9]+)'
//             ];

//             $url = str_replace(array_keys($patterns), array_values($patterns), $url);
//             $request_uri = self::parse_url();

//             if (preg_match('@^' . $url . '$@', $request_uri, $parameters)) {
//                 unset($parameters[0]);
//                 if (is_callable($callback)) {
//                     call_user_func_array($callback, $parameters);
//                 } else {

//                     $controller = explode('@', $callback);
//                     $className = explode('/', $controller[0]);
//                     $className = end($className);

//                     $controllerFile = 'app/controllers/' . strtolower($controller[0]) . '.php';

//                     if (file_exists($controllerFile)) {

//                         require $controllerFile;
//                         call_user_func_array([new $className, $controller[1]], $parameters);
//                     }
//                 }
//             }
//         }
//     }
// }
