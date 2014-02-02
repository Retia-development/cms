<?php
namespace Core;
require_once('core/exceptions/class_not_found.php');

class Loader {
    public $model;

    public function __construct() {
        $this->model = new \StdClass();
    }

    public function model($model_name, $alias=NULL) {
        $path_to_model = ENVIRONMENT_MODELS . "/$model_name.php";
        if (!file_exists($path_to_model)) {
            throw new \Core\Exceptions\ClassNotFound($model_name, 'model');
        }

        require_once($path_to_model);

        if (!class_exists($model_name)) {
            throw new \Core\Exceptions\ClassNotFound($model_name, 'model');
        }

        $reffer_as = is_null($alias) ? ucfirst($model_name) : $alias;
        return $this->model->$reffer_as = new $model_name();
    }
}
