<?php 
namespace Core;
use Exception;

class ControllerNotFound extends Exception {}
class MethodNotFound extends Exception {}

class Parser {
    public static function controller($controller_name) {
        //TODO: Make path_to_controller configurable
        $path_to_controller = "controllers/$controller_name.php";
        if (!file_exists($path_to_controller)) {
            throw new ControllerNotFound();
        }

        include_once($path_to_controller);

        if (!class_exists($controller_name)) {
            throw new ControllerNotFound();
        }
        
        return new $controller_name();
    }

    public static function execute($controller, $method, $params='') {
        if (!method_exists($controller, $method)) {
            throw new MethodNotFound();
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