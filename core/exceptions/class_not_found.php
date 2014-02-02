<?php
namespace Core\Exceptions;

class ClassNotFound extends \Exception {
    public $message;
    public function __construct($class_name, $type) {
        $this->message =
            ucfirst($type)
            . ": "
            . ucfirst($class_name)
            . " cannot be found.";
    }
}