<?php
class Welcome extends BaseController{
    public function index() {
        echo "Hello, my name is Azunyan~ :3";
    }

    public function multiply($a, $b) {
        $answer = $a * $b;
        echo "$a * $b = $answer";
    }

    public function test() {
        echo "This is a test function!";
    }

    private function private_function() {
        echo 'Stop looking at my privates >//<';
    }
}