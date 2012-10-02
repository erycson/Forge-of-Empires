<?php

abstract class CityEntity {
    public $id = '';
    public $asset_id = '';
    public $name = '';
    public $type = '';
    public $width = 0;
    public $length = 0;
    public $construction_time = 0;
    public $upgrade_time = 0;
    public $constructable = false;
    public $resaleable = false;
    public $marketing_partner = null;
    public $points = 0;
    
    const PLACEHOLDER_ID = 'tileset_placeholder';
    const TYPE_EXPANSION = 'tileset';
    const TYPE_EXPANSION_VICTORY = 'tileset_victory';
    const TYPE_EXPANSION_REWARD = 'tileset_reward';
    const TYPE_MAIN_BUILDING = 'main_building';
    const TYPE_PRODUCER = 'production';
    const TYPE_STREET = 'street';
    const TYPE_DECORATION = 'decoration';
    const TYPE_RESIDENCE = 'residential';
    const TYPE_MILITARY = 'military';
    const TYPE_CULTURE = 'culture';
    const TYPE_GOODS = 'goods';
    const TYPE_GREAT_BUILDING = 'greatbuilding';
    
    public function __construct( $data ) {
        $this->id = $data['id'];
        $this->asset_id = $data['asset_id'];
        $this->name = $data['name'];
        $this->type = $data['type'];
        $this->width = (int) $data['width'];
        $this->length = (int) $data['length'];
        $this->construction_time = (int) $data['construction_time'];
        $this->upgrade_time = (int) $data['upgrade_time'];
        $this->constructable = (bool) $data['constructable'];
        $this->resaleable = (bool) $data['resaleable'];
        $this->marketing_partner = $data['marketing_partner'];
        $this->points = (int) $data['points'];
    }
    
    public function getRequirements( $entity_id ) {
        global $db;
        $query = $db->query( "SELECT * FROM city_entity_requirements WHERE entity_id={$entity_id}" );
        $this->requirements = new CityEntityRequirements( $query->fetch() );
    }
    
    public function getResaleResources( $entity_id ) {
        global $db;
        $query = $db->query( "SELECT * FROM city_entity_resale_resources WHERE entity_id={$entity_id}" );        
//        $this->resale_resources = new CityResource( $query->fetch() );
    }
}