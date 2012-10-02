<?php

class CityMapEntity {
    public $id = 0;
    public $cityentity_id = '';
    public $x = 0;
    public $y = 0;
    public $orientation = null;
    public $connected = true;
    public $state;
    public $bought_slots;
    public $level;
    
    public function __construct( $data ) {
        $this->id = (int) $data['id'];
        $this->cityentity_id = $data['entity_id'];
        $this->x = (int) $data['x'];
        $this->y = (int) $data['y'];
        $this->orientation = $data['orientation'];
        $this->connected = (bool) $data['connected'];
        $this->state = new IdleState();
        $this->bought_slots = (int) $data['bought_slots'];
        $this->level = (int) $data['level'];
    }
}