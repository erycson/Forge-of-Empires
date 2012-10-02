<?php

class CityEntityTileset extends CityEntity {
    public $available = false;
    public $resale_resources = null;
    
    public function __construct( $data ) {
        parent::__construct( $data );
        $this->available = (bool) $data['available'];
//        $this->resale_resources = $data['resale_resources'];
    }
}
