<?php

class CityGood {
    public $good_id = '';
    public $value = 0;
    
    public function __construct( $data ) {
        $this->good_id = $data['good_id'];
        $this->value = (int) $data['value'];
    }
}
