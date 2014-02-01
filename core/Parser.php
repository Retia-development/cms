<?php
namespace Core;
require_once('core/exceptions/controller_not_found.php'); 
require_once('core/exceptions/method_not_found.php'); 
require_once('core/exceptions/method_not_callable.php');

class Parser {
    public static function controller($controller_name) {
        //TODO: Make path_to_controller configurable
        $path_to_controller = "controllers/$controller_name.php";
        if (!file_exists($path_to_controller)) {
            throw new \Core\Exceptions\ControllerNotFound($controller_name);
        }

        include_once($path_to_controller);

        if (!class_exists($controller_name)) {
            throw new \Core\Exceptions\ControllerNotFound($controller_name);
        }
        
        return new $controller_name();
    }

    public static function execute($controller, $method=NULL, $params='') {
        if (is_null($method)) {
            $method = 'index';
        }

        if (!method_exists($controller, $method)) {
            throw new \Core\Exceptions\MethodNotFound(get_class($controller), $method);
        }

        if (!is_callable([$controller, $method])) {
            throw new \Core\Exceptions\MethodNotCallable(get_class($controller), $method);
        }

        return call_user_func_array([$controller, $method], self::params($params));
    }

    public static function params($params) {
        $params = explode('/', $params);
        $params = array_filter($params, function($param){
            return strlen(trim($param)) != 0;
        });

        return array_values($params);
    }
}