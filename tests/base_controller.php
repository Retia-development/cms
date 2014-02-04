<?php
class BaseControllerTest extends PHPUnit_Framework_TestCase {
    public function test_if_base_controller_exists() {
        $this->assertTrue(class_exists('BaseController'));
    }

    public function test_if_base_controller_is_abstract() {
        $reflection = new ReflectionClass('BaseController');
        $this->assertTrue($reflection->isAbstract());
    }

    public function test_load_model() {
        $controller = new DummyController();
        $model = $controller->load->model('myModel');
        $this->assertTrue($model instanceof MyModel);
    }
}

class DummyController extends BaseController {

}