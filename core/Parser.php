<?php 
class ControllerNotFound extends Exception {}
class MethodNotFound extends Exception {}

class MyClass {
    public function test() {
        return 'test';
    }
}

class Parser {
    public static function controller($controller_name) {
        if (!class_exists($controller_name)) {
            throw new ControllerNotFound();
        }
        
        return new $controller_name();
    }

    public static function method($controller, $method_name) {
        if (!method_exists($controller, $method_name)) {
            throw new MethodNotFound();
        }

        return $controller->$method_name();
    }

    public static function params($params) {
        $params = explode('/', $params);
        $params = array_filter($params, function($param){
            return strlen(trim($param)) != 0;
        });

        return array_values($params);
    }
}