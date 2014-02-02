<?php
namespace Core;

class Loader {
    public function __construct() {

    }

    public function model($model_name) {
        $path_to_model = ENVIRONMENT_MODELS . "/$model_name.php";
        require_once($path_to_model);
        return new $model_name();
    }
}
