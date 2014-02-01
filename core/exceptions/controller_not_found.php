<?php 
namespace Core\Exceptions;

class ControllerNotFound extends \Exception {
	public $message;
	public function __construct($controller_name) {
		$this->message = "Controller: $controller_name cannot be found.";
	}
}
