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

    public function test_save_model_to_loader() {
        $loader = new Loader();
        $loader->model('myModel');
        $this->assertTrue(isset($loader->model->MyModel));
    }

    public function test_save_model_with_alias() {
        $loader = new Loader();
        $loader->model('myModel', 'myLittleModel');
        $this->assertTrue(isset($loader->model->myLittleModel));
    }
}
