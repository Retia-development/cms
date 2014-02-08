<?php
abstract class BaseController {
    public $load;
    public $input;

    public function __construct() {
        $this->load = new Core\Loader();
        $this->input = new Core\Input();
    }
}
