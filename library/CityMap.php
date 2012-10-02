<?php

class CityMap {
    public $unlocked_areas = array();
    public $entities = array();
    
    public function __construct() {
        $this->unlocked_areas[] = new CityMapUnlockedArea();
        $this->getCityMapEntity();
    }
    
    private function getCityMapEntity() {
        global $db;
        $query = $db->query( 'SELECT me.*, e.name AS entity_id FROM city_map_entity me, city_entity e WHERE e.entity_id=me.entity_id AND me.player_id=1' );
        
        while( $data = $query->fetch() )
            $this->entities[] = new CityMapEntity( $data );
    }
}