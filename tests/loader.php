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

    public function test_view_passing_values() {
        $loader = new Loader();
        $view_content = $loader->view('multiply.php', ['two' => 2, 'three' => 3]);
        $this->assertEquals($view_content, 6);
    }

    public function test_view_pass_object() {
        $my_object = new DummyClass();
        $loader = new Loader();
        $view_content = $loader->view('object.php', ['object' => $my_object]);
        $this->assertEquals($view_content, 10);
    }

    public function test_view_pass_function() {
        $function = function($a, $b) {
            return $a + $b;
        };

        $loader = new Loader();
        $view_content = $loader->view('function.php', ['function' => $function]);
        $this->assertEquals($view_content, 2);
    }

    public function test_view_html() {
        $loader = new Loader();
        $view_content = '<!DOCTYPE html><html><head></head><body>hai</body></html>';

        $this->assertEquals($loader->view('normal.html'), $view_content);
    }

    public function test_view_html_with_params() {
        $loader = new Loader();
        $view_content = '<!DOCTYPE html><html><head></head><body>1</body></html>';
        $this->assertEquals($loader->view('withphp.html', ['i' => 1]), $view_content);
    }

    public function test_load_template() {
        $loader = new Loader();
        $template = $loader->template();
        $this->assertInstanceOf('Core\Template', $template);
    }

    public function test_template_file_not_found() {
        $this->setExpectedException('Core\Exceptions\FileNotFound');
        $loader = new Loader();
        $loader->template('something');
    }

    public function test_class_not_found() {
        $this->setExpectedException('Core\Exceptions\ClassNotFound');
        $loader = new Loader();
        $loader->template('invalid');
    }
}

class DummyClass {
    public function sum(array $numbers) {
        return array_sum($numbers);
    }
}
