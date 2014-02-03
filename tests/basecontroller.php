<?php
class BaseControllerTest extends PHPUnit_Framework_TestCase {
    public function test_if_base_controller_exists() {
        $this->assertTrue(class_exists('BaseController'));
    }

    public function test_if_base_controller_is_abstract() {
        $reflection = new ReflectionClass('BaseController');
        $this->assertTrue($reflection->isAbstract());
    }
}
