<?php

class CityEntityResidentialBuilding extends CityEntity {
    public $provided_population = 0;
    public $demand_for_happiness = 0;
    
    public function __construct( $data ) {
        parent::__construct( $data );
        $this->provided_population = (int) $data['provided_population'];
        $this->demand_for_happiness = (int) $data['demand_for_happiness'];
    }
}
