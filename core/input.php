<?php
namespace Core;

class Input {
    private $_post_values;

    public function __construct() {
        $this->_post_values = $_POST;
        array_walk_recursive($this->_post_values, function(&$value) {
            if (!strlen(trim($value))) {
                $value = NULL;
            }
        });
    }

    public function post($value=NULL) {
        if (is_null($value)) {
            return $this->_post_values;
        }

        if (!isset($this->_post_values[$value])) {
            return NULL;
        }

        return $this->_post_values[$value];
    }
}