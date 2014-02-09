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

    public function view($view_file, array $params=[]) {
        $path_to_view = ENVIRONMENT_VIEWS . "$view_file";
        if (!file_exists($path_to_view)) {
            throw new \Core\Exceptions\FileNotFound($path_to_view);
        }

        ob_start();
        extract($params);
        include($path_to_view);
        return ob_get_clean();
    }

    public function template($template=TEMPLATE) {
        $path_to_template = ENVIRONMENT_TEMPLATES . "$template/$template.php";
        if (!file_exists($path_to_template)) {
            throw new \Core\Exceptions\FileNotFound($path_to_template);
        }

        require_once($path_to_template);

        if (!class_exists($template)) {
            throw new \Core\Exceptions\ClassNotFound($template, 'Template');
        }

        return new $template();
    }
}
