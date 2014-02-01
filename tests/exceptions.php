<?php 
require_once('core/exceptions/controller_not_found.php');
require_once('core/exceptions/method_not_found.php');
use \Core\Exceptions\ControllerNotFound as ControllerNotFound;
use \Core\Exceptions\MethodNotFound as MethodNotFound;

class ExceptionsTest extends PHPUnit_Framework_TestCase {
    public function test_controller_not_found() {
        $exception = new ControllerNotFound('myController');
        $this->assertEquals($exception->message, 'Controller: myController cannot be found.');
    }

    public function test_method_not_found() {
        $exception = new MethodNotFound('MyController', 'e');
        $this->assertEquals($exception->message, 'Controller: MyController has no method called e');
    }
}