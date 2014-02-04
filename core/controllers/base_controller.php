<?php
abstract class BaseController {
    public $load;
    public function __construct() {
        $this->load = new Core\Loader();
    }
}
