<?php
namespace Core;

class Input {
    private $_post_values;
    private $_get_values;
    private $_file_values;

    public function __construct() {
        $this->_post_values = $_POST;
        $this->_get_values = $_GET;
        $this->_file_values = $_FILES;
        $this->_parse('_post_values');
        $this->_parse('_get_values', 'urldecode');
    }

    public function post($key=NULL) {
        return $this->_get_input($this->_post_values, $key);
    }

    public function get($key=NULL) {
        return $this->_get_input($this->_get_values, $key);
    }

    private function _get_input($values, $key) {
        if (is_null($key)) {
            return $values;
        }

        if (!isset($values[$key])) {
            return NULL;
        }

        return $values[$key];
    }

    public function file($key=NULL) {
        return $this->_get_input($this->_file_values, $key);
    }

    private function _parse($prop, $func=NULL) {
        array_walk_recursive($this->$prop, function(&$value) use($func) {
            if (!is_null($func)) {
                $value = $func($value);
            }

            if (!strlen(trim($value))) {
                $value = NULL;
            }
        });
    }
}