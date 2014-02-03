<?php
require_once('core/exceptions/class_not_found.php');
require_once('core/exceptions/method_not_found.php');
require_once('core/exceptions/method_not_callable.php');
require_once('core/exceptions/no_abstraction_of_base.php');

use \Core\Exceptions\ClassNotFound as ClassNotFound;
use \Core\Exceptions\MethodNotFound as MethodNotFound;
use \Core\Exceptions\MethodNotCallable as MethodNotCallable;
use \Core\Exceptions\NoAbstractionOfBase as NoAbstractionOfBase;

class ExceptionsTest extends PHPUnit_Framework_TestCase {
    public function test_class_not_found() {
        $exception = new ClassNotFound('myController', 'controller');
        $this->assertEquals($exception->message, 'Controller: MyController cannot be found.');
    }

    public function test_method_not_found() {
        $exception = new MethodNotFound('MyController', 'e', 'controller');
        $this->assertEquals($exception->message, 'Controller: MyController has no method called e.');
    }

    public function test_method_not_callable() {
    	$exception = new MethodNotCallable('MyController', 'e', 'controller');
    	$this->assertEquals($exception->message, 'Controller: MyController Method: e is not callable.');
    }

    public function test_no_abstraction_of_base() {
        $exception = new NoAbstractionOfBase('MyController');
        $this->assertEquals($exception->message, 'MyController is no abstraction of base.');
    }

}