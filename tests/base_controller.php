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

    public function test_input_single_post() {
        $_POST['firstname'] = 'Thomas';
        $controller = new DummyController();
        $this->assertSame($controller->input->post('firstname'), 'Thomas');
    }

    public function test_input_single_get() {
        $_GET['fullname'] = 'Thomas%20Farla';
        $controller = new DummyController();
        $this->assertSame('Thomas Farla', $controller->input->get('fullname'));
    }
}

class DummyController extends BaseController {

}