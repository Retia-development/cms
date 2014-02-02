<?php
namespace Core\Exceptions;

class MethodNotFound extends \Exception {
    public $message;
    public function __construct($class_name, $method_name, $type) {
        $this->message = ucfirst($type)
        . ": $class_name has no method called $method_name.";
    }
}