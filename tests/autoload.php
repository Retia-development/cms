<?php

class AutoLoadTest extends PHPUnit_Framework_TestCase {
    function test_auto_load() {
        $classes = ['tests/controllers/autoloader_test.php', '', ''];
        $autoload = new Autoload();
        $autoload->add_classes($classes);
        $this->assertEquals($classes, $autoload->classes);
    }
}