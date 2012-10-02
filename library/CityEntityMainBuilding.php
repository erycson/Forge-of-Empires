<?php

class CityEntityMainBuilding extends CityEntity {
    public $current_upgrade_level = 0;
    public $available_amount = null;
    
    public function __construct( $data ) {
        parent::__construct( $data );
        $this->current_upgrade_level = (int) $data['current_upgrade_level'];
        $this->available_amount = $data['available_amount'];
    }
}