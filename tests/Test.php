<?php
require('config/config.php');
require_once('core/controllers/base_controller.php');
require_once('core/exceptions/class_not_found.php');
require_once('core/exceptions/method_not_found.php');
require_once('core/exceptions/method_not_callable.php');
require_once('core/exceptions/no_abstraction_of_base.php');
require_once('core/Parser.php');
require_once('core/loader.php');

define('ENVIRONMENT', 'test');
define('ENVIRONMENT_CONTROLLERS', 'tests/controllers/');
define('ENVIRONMENT_MODELS', 'tests/models/');
foreach (glob('tests/*.php') as $file) {
    $filename = pathinfo($file, PATHINFO_FILENAME);
    if ($filename == pathinfo(__file__, PATHINFO_FILENAME)) {
        continue;
    }

    include($file);
    $class_name = ucfirst("{$filename}Test");
    if (!class_exists($class_name)) {
        echo "WARNING: Can't find class $class_name in $file \n";
        continue;
    }

    new $class_name();
}
