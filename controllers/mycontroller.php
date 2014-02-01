<?php 
class MyController {
	public function index() {
		return 'indekusu';
	}

    public function test() {
        return 'test';
    }

    public function multiply($a, $b) {
        return $a * $b;
    }
}