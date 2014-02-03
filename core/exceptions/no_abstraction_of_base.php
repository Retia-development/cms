<?php
namespace Core\Exceptions;

class NoAbstractionOfBase extends \Exception {
    public $message;
    public function __construct($class) {
        $this->message = "$class is no abstraction of base.";
    }
}