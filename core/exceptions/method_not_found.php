<?php 
namespace Core\Exceptions;

class MethodNotFound extends \Exception {
    public $message;
    public function __construct($controller_name, $method_name) {
        $this->message = "Controller: $controller_name has no method called $method_name";
    }
}