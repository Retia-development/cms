<?php 
namespace Core\Exceptions;

class MethodNotCallable extends \Exception {
    public $message;
    public function __construct($controller, $method) {
        $this->message = "Controller: $controller Method: $method is not callable.";
    }
}