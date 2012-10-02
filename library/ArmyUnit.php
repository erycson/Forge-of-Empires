<?php

class ArmyUnit {
    public $id = 0;
    public $entity_id = 0;
    public $slot_id = null;
    public $unitType;
    public $max_hitpoints = 0;
    public $next_healing = 0;
    public $next_healing_step_size = 0;
    public $points = 0;
    public $unitTypeId = '';
    public $name = '';
    public $_hitpoints = 0;
    public $unitClass = '';
//    public $owner = null;
//    public $posX = null;
//    public $posY = null;
    
    public function __construct() {
        $this->unitType[] = new BattleUnitType();
    }
}
