<?php
namespace Core;

class Input {
    public function post() {
        $post_values = $_POST;
        $a = array_walk_recursive($post_values, function(&$value) {
            if (!strlen(trim($value))) {
                $value = NULL;
            }
        });
        return $post_values;
    }
}