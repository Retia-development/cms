<?php
namespace Core;

class Input {
    public function post() {
        $post_values = $_POST;
        array_walk($post_values, function($key, $value){
            if (strlen(trim($value))) {
                return $value;
            }

            return NULL;
        });
        return $post_values;
    }
}