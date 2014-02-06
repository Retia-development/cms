<?php
use Core\Input as Input;

class InputTest extends PHPUnit_Framework_TestCase {
    function test_post_values() {
        $post_values = [
            'firstname'=>'Gill',
            'lastname' => 'Bates',
            'password' => '1234',
            'zipcode' => '1234AJ',
        ];
        $_POST = $post_values;
        $input = new Input();
        $this->assertEquals($_POST, $input->post());
    }

    function test_post_empty_values() {
        $post_values = ['haiya' => '',
                        'firstname' => 'Thomas',
                        'empty' => ''];
        $_POST = $post_values;
        $input = new Input();
        $expected_values = ['haiya' => NULL,
                            'firstname' => 'Thomas',
                            'empty' => NULL];
        $this->assertSame($expected_values, $input->post());
    }

    function test_post_multi_dimentional_array() {
        $post_values = [
            'address' =>
                ['zipcode' => '1234AJ', 'city' => 'Somewhere'],
            'phone_numbers' =>
                ['0123456789', '032131231', '321321'],
            'firstname' => 'Thomas'
        ];
        $_POST = $post_values;
        $input = new Input();
        $this->assertEquals($_POST, $input->post());
    }

    function test_post_multi_dimentional_array_with_empty_values() {
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
        $expected_values = [
            'species' =>
                ['humans' =>
                    [
                        ['Thomas', NULL, '4', NULL, '2'],
                        ['Bart', '2', NULL, '3', '1']
                    ]
                ]
            ];
        $input = new Input();
        $values = $input->post();
        $this->assertSame($expected_values, $input->post());
    }

    function test_post_single_value() {
        $_POST['firstname'] = 'Thomas';
        $_POST['lastname'] = 'Farla';
        $input = new Input();
        $value = $input->post('firstname');
        $this->assertEquals('Thomas', $value);
    }

    function test_post_single_value_not_found() {
        $input = new Input();
        $this->assertSame($input->post('firstname'), NULL);
    }

    function test_post_single_array() {
        $values = [
            'lastname' => 'Farla',
            'codes' => ['131', '', 2, NULL],
            'empty' => '',
            'null' => NULL,
        ];

        $_POST = $values;
        $input = new Input();
        $this->assertSame(['131', NULL, 2, NULL], $input->post('codes'));
    }
}
