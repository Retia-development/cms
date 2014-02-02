<?php
require_once('core/loader.php');
use Core\Loader as Loader;

class LoaderTest extends PHPUnit_Framework_TestCase {
    public function test_load_model() {
        $loader = new Loader();
        $model = $loader->model('MyModel');
        $this->assertEquals($model->test(), 'test');
    }
}