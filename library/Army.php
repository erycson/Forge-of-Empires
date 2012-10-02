<?php

class Army {
    public $id = 0;
    public $name = '';
    public $units = array();
    public $is_pool = false;
    public $is_defending = false;
    
    public function __construct() {
        $this->units[] = new ArmyUnit();
    }
}