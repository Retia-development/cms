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
require_once('core/debug/backtrace.php');
use \Core\Parser as Parser;


// TODO: set ENVIRONMENT constants to either admin or 'frontend'
define('ENVIRONMENT', 'not yet impleneted');
define('ENVIRONMENT_CONTROLLERS', 'controllers/');
define('ENVIRONMENT_VIEWS', 'views/');

//TODO: Add configurable default controller
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Welcome';
$method = isset($_GET['method']) ? $_GET['method'] : NULL;
$params = isset($_GET['params']) ? $_GET['params'] : NULL;

try {
	Parser::execute(Parser::controller($controller), $method, $params);
} catch (Exception $e) {
	echo $e->message;
    $backtrace = new Core\Debug\Backtrace();
    $backtrace->form_exception($e);
    echo $backtrace;
}