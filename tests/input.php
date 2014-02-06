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

    function test_post_empty_values() {
        $input = new Input();
        $post_values = ['haiya' => '', 'firstname' => 'Thomas', 'empty' => ''];
        $_POST = $post_values;
        $values = $input->post();
        $this->assertTrue(is_null($values['haiya']));
        $this->assertTrue(is_null($values['empty']));
        $this->assertFalse(is_null($values['firstname']));
    }

    function test_post_multi_dimentional_array() {
        $input = new Input();
        $post_values = [
            'address' =>
                ['zipcode' => '1234AJ', 'city' => 'Somewhere'],
            'phone_numbers' =>
                ['0123456789', '032131231', '321321'],
            'firstname' => 'Thomas'
        ];

        $_POST = $post_values;
        $this->assertEquals($_POST, $input->post());
    }

    function test_post_multi_dimentional_array_with_empty_values() {
        $input = new Input();
        $post_values = [
            'species' =>
                ['humans' =>
                    [
                        ['Thomas', '', '4', '', '2'],
                        ['Bart', '2', '', '3', '1']
                    ]
                ]
            ];
        $_POST = $post_values;
        $post_values = [
            'species' =>
                ['humans' =>
                    [
                        ['Thomas', NULL, '4', NULL, '2'],
                        ['Bart', '2', NULL, '3', '1']
                    ]
                ]
            ];
        $values = $input->post();
        $this->assertSame($post_values, $input->post());
    }
}