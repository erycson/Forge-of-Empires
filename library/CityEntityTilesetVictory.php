<?php

class CityEntityTilesetVictory extends CityEntity {
    public $available = false;
    public $resale_resources;
    
    public function __construct( $data ) {
        parent::__construct( $data );
        $this->available = (bool) $data['available'];
        $this->getRequirements( $data['entity_id'] );
        
//        $this->resale_resources = $data['resale_resources'];
    }
}
