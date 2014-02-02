<?php 
define('ENVIRONMENT', 'test');
define('ENVIRONMENT_CONTROLLERS', 'tests/controllers/');

require('case.php');
require('routes.php');
require('exceptions.php');
$c = new CaseTest();
$routes = new RoutesTest();
$exceptions = new ExceptionsTest();
