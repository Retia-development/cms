<?php
namespace Core\Exceptions;

class ModelNotFound extends \Exception {
    public $message;
    public function __construct($model) {
        $this->message = "Model: $model cannot be found.";
    }
}