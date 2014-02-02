<?php 
require('core/Parser.php');
use \Core\Parser as Parser;


// TODO: set ENVIRONMENT constants to either admin or 'frontend' 
define('ENVIRONMENT', 'not yet impleneted');
define('ENVIRONMENT_CONTROLLERS', 'controllers/');

//TODO: Add configurable default controller
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Welcome';
$method = isset($_GET['method']) ? $_GET['method'] : NULL;
$params = isset($_GET['params']) ? $_GET['params'] : NULL;

try {
	Parser::execute(Parser::controller($controller), $method, $params);
} catch (Exception $e) {
	echo $e->message;
}