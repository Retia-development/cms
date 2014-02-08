<?php
namespace Core\Debug;

class Backtrace {
    public $trace;
    public function form_exception($e) {
        $this->trace = $e->getTrace();
    }

    public function __toString() {
        $string = '<h1>Backtrace</h1>';
        foreach ($this->trace as $key => $trace) {
            $string.='<details>';
                $string.='<summary>' . $trace['file'] . ':' . $trace['line'] . '</summary>';
                    $string.= '<pre>';
                        $string.='<code>';
                            $string.= print_r($trace, TRUE);
                        $string.='</code>';
                    $string.= '</pre>';
            $string.='</details>';
        }

        return $string;
    }
}