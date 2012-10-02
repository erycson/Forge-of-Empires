<?php

class CityEntityGoodsBuilding extends CityEntity {
    public $available_amount = false;
    
    public function __construct( $data ) {
        parent::__construct( $data );
        $this->available_amount = (bool) $data['available_amount'];
    }
}
