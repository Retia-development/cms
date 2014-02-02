<?php
require_once('core/controllers/base_controller.php');

class BaseControllerTest extends PHPUnit_Framework_TestCase {
    public function test_if_base_controller_exists() {
        $this->assertTrue(class_exists('BaseController'));
    }
}
