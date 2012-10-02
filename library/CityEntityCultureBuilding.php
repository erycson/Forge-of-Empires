<?php

class CityEntityCultureBuilding extends CityEntity {
    public $provided_happiness = 0;
    
    public function __construct( $data ) {
        parent::__construct( $data );
        $this->provided_happiness = (int) $data['provided_happiness'];
    }
}