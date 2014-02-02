<?php
require_once('core/exceptions/class_not_found.php');
require_once('core/exceptions/controller_not_found.php');
require_once('core/exceptions/model_not_found.php');
require_once('core/exceptions/method_not_found.php');
require_once('core/exceptions/method_not_callable.php');

use \Core\Exceptions\ClassNotFound as ClassNotFound;
use \Core\Exceptions\ControllerNotFound as ControllerNotFound;
use \Core\Exceptions\ModelNotFound as ModelNotFound;
use \Core\Exceptions\MethodNotFound as MethodNotFound;
use \Core\Exceptions\MethodNotCallable as MethodNotCallable;

class ExceptionsTest extends PHPUnit_Framework_TestCase {
    public function test_class_not_found() {
        $exception = new ClassNotFound('myController', 'controller');
        $this->assertEquals($exception->message, 'Controller: MyController cannot be found.');
    }

    public function test_controller_not_found() {
        $exception = new ControllerNotFound('myController');
        $this->assertEquals($exception->message, 'Controller: myController cannot be found.');
    }

    public function test_model_not_found() {
        $exception = new ModelNotFound("myModel");
        $this->assertEquals($exception->message, 'Model: myModel cannot be found.');
    }

    public function test_method_not_found() {
        $exception = new MethodNotFound('MyController', 'e', 'controller');
        $this->assertEquals($exception->message, 'Controller: MyController has no method called e.');
    }

    public function test_method_not_callable() {
    	$exception = new MethodNotCallable('MyController', 'e', 'controller');
    	$this->assertEquals($exception->message, 'Controller: MyController Method: e is not callable.');
    }

}