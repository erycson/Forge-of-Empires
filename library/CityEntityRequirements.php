<?php

class CityEntityRequirements {
    public $resources;
    public $tech_id;
    public $tech_researched;
    public $min_era;
    
    public function __construct( $data ) {
        $this->resources = new CityResource( $data );
        $this->tech_id = (int) $data['tech_id'];
        $this->tech_researched = $data['tech_researched'] == null ? null : (bool) $data['tech_researched'];
        $this->min_era = $data['min_era'];
    }
}
