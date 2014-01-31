<?php 
class ControllerNotFound extends Exception {}
class MethodNotFound extends Exception {}

class MyClass {
    public function test() {
        return 'test';
    }

    public function multiply($a, $b) {
        return $a * $b;
    }
}

class Parser {
    public static function controller($controller_name) {
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