<?php
namespace Core\Exceptions;

class MethodNotCallable extends \Exception {
    public $message;
    public function __construct($class_name, $method, $type) {
        $this->message = ucfirst($type)
        . ": $class_name Method: $method is not callable.";
    }
}