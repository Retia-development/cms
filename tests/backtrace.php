<?php
use Core\Debug\Backtrace as Backtrace;

class BacktraceTest extends PHPUnit_Framework_TestCase {
    function test_parse_backtrace() {
        try {
            throw new Exception();
        } catch (Exception $e) {
            $backtrace = new Backtrace();
            $trace = $backtrace->form_exception($e);
            $this->assertSame($backtrace->trace, $e->getTrace());
        }
    }

    function test_to_string() {
        try {
            throw new Exception();
        } catch (Exception $e) {
            $backtrace = new Backtrace();
            $backtrace->form_exception($e);
            $string = $backtrace;
        }
    }
}
