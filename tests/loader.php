<?php
use Core\Loader as Loader;

class LoaderTest extends PHPUnit_Framework_TestCase {
    public function test_load_model() {
        $loader = new Loader();
        $model = $loader->model('MyModel');
        $this->assertEquals($model->test(), 'test');
    }

    public function test_load_invalid_model_file() {
        $this->setExpectedException('\Core\Exceptions\ClassNotFound');
        $loader = new Loader();
        $loader->model('InValidModel');
    }

    public function test_load_invalid_model_class() {
        $this->setExpectedException('\Core\Exceptions\ClassNotFound');
        $loader = new Loader();
        $loader->model('ModelWithDifferentNameThanFile');
    }

    public function test_duplicate_models() {
        $loader = new Loader();
        $first_model = $loader->model('myModel');
        $second_model = $loader->model('myModel');

        $first_model->a_very_random_value = 1337;
        $this->assertFalse(isset($second_model->a_very_random_value));
    }

    public function test_load_view() {
        $loader = new Loader();
        $view_content = file_get_contents('tests/views/myview.php');
        $this->assertSame($view_content, $loader->view('myview.php'));
    }

    public function test_view_doesnt_exists() {
        $this->setExpectedException('Core\Exceptions\FileNotFound');
        $loader = new Loader();
        $loader->view('nonExisting.adadawdakdawd');
    }
}
