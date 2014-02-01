<?php 
require('core/Parser.php'); 

class RoutesTest extends PHPUnit_Framework_TestCase {
    public function test_get_class() {
        $controller = \Core\Parser::controller('MyController');
        $this->assertInstanceOf('MyController', $controller);
    }

    public function test_get_class_invalid_controller() {
        $this->setExpectedException('ControllerNotFound');
        $invalid_controller_name = 'InvalidClass';
        \Core\Parser::controller($invalid_controller_name);
    }

    public function test_method() {
        $controller = \Core\Parser::controller('MyController');
        $method = 'test';
        $output = \Core\Parser::execute($controller, $method);
        $this->assertEquals($output, 'test');
    }

    public function test_invalid_method() {
        $this->setExpectedException('MethodNotFound');
        $controller = \Core\Parser::controller('MyController');
        $method = 'this_is_an_invalid_method';
        \Core\Parser::execute($controller, $method);
    }

    public function test_params() {
        $params = '1/2/3';
        $this->assertEquals(['1', '2', '3'], \Core\Parser::params($params));
    }

    public function test_params_with_weird_seperators() {
        $params = '/1/2/3//4';
        $this->assertEquals(['1', '2', '3', '4'], \Core\Parser::params($params));
    }

    public function test_empty_params() {
        $params = '';
        $this->assertEquals([], \Core\Parser::params($params));
    }

    public function test_controller_method_with_params() {
        $controller_name = 'MyController';
        $method_name = 'multiply';
        $params = '2/3';

        $controller = \Core\Parser::controller($controller_name);
        $output = \Core\Parser::execute($controller, $method_name, $params);

        $this->assertEquals($output, 6);
    }
}