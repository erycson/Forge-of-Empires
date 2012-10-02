<?php

class Era {
    public $era = '';
    public $mainBuildingUrl = '';
    public $mainBuildingId = '';
    
    public function __construct( $data ) {
        $this->era = 'BronzeAge';
        $this->mainBuildingUrl = 'H_SS_BronzeAge_Townhall.png';
        $this->mainBuildingId = 'H_BronzeAge_Townhall';
    }
}