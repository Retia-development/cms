<?php
require('config/config.php');
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
