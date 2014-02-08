<?php
namespace Core;

class Loader {
    public function model($model_name) {
        $path_to_model = ENVIRONMENT_MODELS . "/$model_name.php";

        if (!file_exists($path_to_model)) {
            throw new \Core\Exceptions\ClassNotFound($model_name, 'model');
        }

        require_once($path_to_model);

        if (!class_exists($model_name)) {
            throw new \Core\Exceptions\ClassNotFound($model_name, 'model');
        }

        return new $model_name();
    }

    public function view($view_name) {
        $path_to_view = "tests/views/$view_name";
        if (!file_exists($path_to_view)) {
            throw new \Core\Exceptions\FileNotFound($path_to_view);
        }

        return file_get_contents($path_to_view);
    }
}
