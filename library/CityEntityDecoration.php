<?php

class CityEntityDecoration extends CityEntity {
    public $provided_happiness = false;
    public $resale_resources;
    
    public function __construct( $data ) {
        parent::__construct( $data );
        $this->provided_happiness = (int) $data['provided_happiness'];
        $this->getResaleResources( $data['entity_id'] );
    }
}