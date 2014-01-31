<?php 
class ControllerNotFound extends Exception {}


class MyClass {}

class Parser {
    public static function controller($controller_name) {
        if (!class_exists($controller_name)) {
            throw new ControllerNotFound();
        }
        
        return new $controller_name();
    }
}