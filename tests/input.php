<?php
use Core\Input as Input;

class InputTest extends PHPUnit_Framework_TestCase {
    function test_post_values() {
        $input = new Input();
        $post_values = [
            'firstname'=>'Gill',
            'lastname' => 'Bates',
            'password' => '1234',
            'zipcode' => '1234AJ',
        ];
        $_POST = $post_values;
        $this->assertEquals($_POST, $input->post());
    }

    function test_empty_values() {
        $input = new Input();
        $post_values = ['haiya'=>'', 'firstname' => 'Thomas', 'empty' => ''];
        $_POST = $post_values;
        $this->assertEquals(
            ['haiya'=> NULL, 'firstname' => 'Thomas', 'empty' => NULL],
            $input->post());
    }
}