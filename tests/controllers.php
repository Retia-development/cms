<?php
require_once('core/controllers/base_controller.php');

class ControllerTest extends PHPUnit_Framework_TestCase {
    public function test_exists_base_controller() {
        $this->assertTrue(class_exists('BaseController'));

    }


}