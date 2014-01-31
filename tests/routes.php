<?php 
require('core/Parser.php'); 

class RoutesTest extends PHPUnit_Framework_TestCase {
    public function test_get_class() {
        $controller = Parser::controller('myClass');
        $this->assertInstanceOf('MyClass', $controller);
    }

    public function test_get_class_invalid_controller() {
        $this->setExpectedException('ControllerNotFound');
        $invalid_controller_name = 'InvalidClass';
        Parser::controller($invalid_controller_name);
    }

    public function test_call_class_method() {
        $controller = Parser::controller('myClass');
        $method = 'test';
        $output = Parser::method($controller, $method);
        $this->assertEquals($output, 'test');
    }

    public function test_call_class_invalid_method() {
        $this->setExpectedException('MethodNotFound');
        $controller = Parser::controller('MyClass');
        $method = 'this_is_an_invalid_method';
        Parser::method($controller, $method);
    }
}