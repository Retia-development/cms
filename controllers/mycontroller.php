<?php 
class MyController {
	public function index() {
        $value = 'indekusu';
		echo $value;
        return $value;
	}

    public function test() {
        $value = 'test';
        echo $value;
        return $value;
    }

    public function multiply($a, $b) {
        $value = $a * $b;
        echo "$a * $b = $value";
        return $value;
    }

    private function private_method() {
    	return 'I am private';
    }
}