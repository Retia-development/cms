<?php 
require('core/Parser.php');
use \Core\Parser as Parser;

//TODO: Add configurable default controller
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'MyController';
$method = isset($_GET['method']) ? $_GET['method'] : NULL;
$params = isset($_GET['params']) ? $_GET['params'] : NULL;

try {
	Parser::execute(Parser::controller($controller), $method, $params);
} catch (Exception $e) {
	//TODO: Handle exceptions
	var_dump($e);
}