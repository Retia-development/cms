<?php 
require('core/Parser.php'); 
use Core\Parser as Parser;

class RoutesTest extends PHPUnit_Framework_TestCase {
    public function test_get_class() {
        $controller = Parser::controller('MyController');
        $this->assertInstanceOf('MyController', $controller);
    }

    public function test_get_class_invalid_controller() {
        $this->setExpectedException('\Core\ControllerNotFound');
        $invalid_controller_name = 'InvalidClass';
        Parser::controller($invalid_controller_name);
    }

    public function test_method() {
        $controller = Parser::controller('MyController');
        $method = 'test';
        $output = Parser::execute($controller, $method);
        $this->assertEquals($output, 'test');
    }

    public function test_default_method() {
        $controller = Parser::controller('MyController');
        $output = Parser::execute($controller);
        $this->assertEquals($output, 'indekusu');
    }

    public function test_invalid_method() {
        $this->setExpectedException('\Core\MethodNotFound');
        $controller = Parser::controller('MyController');
        $method = 'this_is_an_invalid_method';
        Parser::execute($controller, $method);
    }

    public function test_is_method_not_callable() {
        $this->setExpectedException('\Core\MethodNotCallable');
        $controller = Parser::controller('MyController');
        $method = 'private_method';
        Parser::execute($controller, $method);
    }

    public function test_params() {
        $params = '1/2/3';
        $this->assertEquals(['1', '2', '3'], Parser::params($params));
    }

    public function test_params_with_weird_seperators() {
        $params = '/1/2/3//4';
        $this->assertEquals(['1', '2', '3', '4'], Parser::params($params));
    }

    public function test_empty_params() {
        $params = '';
        $this->assertEquals([], Parser::params($params));
    }

    public function test_controller_method_with_params() {
        $controller_name = 'MyController';
        $method_name = 'multiply';
        $params = '2/3/';

        $controller = Parser::controller($controller_name);
        $output = Parser::execute($controller, $method_name, $params);

        $this->assertEquals($output, 6);
    }
}