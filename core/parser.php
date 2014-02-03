<?php
namespace Core;
require_once('core/exceptions/class_not_found.php');
require_once('core/exceptions/method_not_found.php');
require_once('core/exceptions/method_not_callable.php');
require_once('core/exceptions/no_abstraction_of_base.php');

class Parser {
    public static function controller($controller_name) {
        $path_to_controller = ENVIRONMENT_CONTROLLERS."$controller_name.php";
        if (!file_exists($path_to_controller)) {
            throw new \Core\Exceptions\ClassNotFound($controller_name, 'Controller');
        }

        include_once($path_to_controller);

        if (!class_exists($controller_name)) {
            throw new \Core\Exceptions\ClassNotFound($controller_name, 'Controller');
        }

        $controller = new $controller_name();
        if (!is_subclass_of($controller, 'BaseController')) {
            throw new \Core\Exceptions\NoAbstractionOfBase($controller_name);
        }

        return $controller;
    }

    public static function execute($controller, $method=NULL, $params='') {
        if (is_null($method) || !strlen(trim($method))) {
            $method = DEFAULT_CONTROLLER_METHOD;
        }

        if (!method_exists($controller, $method)) {
            throw new \Core\Exceptions\MethodNotFound(get_class($controller),
                                                      $method,
                                                      'Controller');
        }

        if (!is_callable([$controller, $method])) {
            throw new \Core\Exceptions\MethodNotCallable(get_class($controller),
                                                                   $method,
                                                                   'Controller');
        }

        return call_user_func_array([$controller, $method],
                                    self::params($params));
    }

    public static function params($params) {
        $params = explode('/', $params);
        $params = array_filter($params, function($param){
            return strlen(trim($param)) != 0;
        });

        return array_values($params);
    }
}