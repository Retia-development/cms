<?php
define('ENVIRONMENT', 'test');
define('ENVIRONMENT_CONTROLLERS', 'tests/controllers/');

$test_classess = [];
foreach (glob('tests/*.php') as $file) {
    $filename = strtolower(pathinfo($file, PATHINFO_FILENAME));
    if ($filename == 'test') {
        continue;
    }

    include($file);
    $class_name = ucfirst("{$filename}Test");
    if (!class_exists($class_name)) {
        echo "WARNING: Can't find class $class_name in $file \n";
        continue;
    }

    $test_classess[] = new $class_name();
}
