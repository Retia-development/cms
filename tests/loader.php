<?php
require_once('core/exceptions/class_not_found.php');
require_once('core/loader.php');
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
}
