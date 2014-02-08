<?php
namespace Core\Exceptions;

class FileNotFound extends \Exception {
    public $message;
    public function __construct($file) {
        $this->message = "File: $file not found";
    }
}