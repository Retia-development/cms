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
}