<?php
require('config/config.php');
require_once('core/controllers/base_controller.php');
require_once('core/exceptions/class_not_found.php');
require_once('core/exceptions/method_not_found.php');
require_once('core/exceptions/method_not_callable.php');
require_once('core/exceptions/no_abstraction_of_base.php');
require_once('core/exceptions/file_not_found.php');
require_once('core/Parser.php');
require_once('core/loader.php');
require_once('core/input.php');
require_once('core/template.php');

define('ENVIRONMENT', 'test');
define('ENVIRONMENT_CONTROLLERS', 'tests/controllers/');
define('ENVIRONMENT_MODELS', 'tests/models/');
define('ENVIRONMENT_VIEWS', 'tests/views/');
define('ENVIRONMENT_TEMPLATES', 'tests/templates/');
define('TEMPLATE', 'mytemplate');

foreach (glob('tests/*.php') as $file) {
    $filename = pathinfo($file, PATHINFO_FILENAME);
    if ($filename == pathinfo(__file__, PATHINFO_FILENAME)) {
        continue;
    }

    include($file);
    $class_name = ucfirst("{$filename}Test");
    $class_name = str_replace('_', NULL, $class_name);
    if (!class_exists($class_name)) {
        echo "WARNING: Can't find class $class_name in $file \n";
        continue;
    }

    new $class_name();
}
