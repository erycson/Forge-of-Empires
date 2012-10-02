<?php

class CityResource {
    public $money = '';
    public $supplies = 0;
    public $population = 0;
    public $medals = 0;
    public $goods = array();
    public $strategy_points;
    public $expansions = 0;
    public $premium = 0;
    
    public function __construct( $data ) {
        $this->money = (int) $data['money'];
        $this->supplies = (int) $data['supplies'];
        $this->population = (int) $data['population'];
        $this->medals = (int) $data['medals'];
        if ( isset( $data['goods'] ) )
            $this->getGoods( $data['goods'] );
        if ( isset( $data['strategy_points'] ) )
            $this->strategy_points = new StrategyPoints( $data['strategy_points'] );
        $this->expansions = (int) $data['expansions'];
        $this->premium = (int) $data['premium'];
    }
    
    public function getGoods( $goods ) {
        if ( count( $goods ) ) {
            foreach( $goods as $data )
                $this->goods[] = new CityGood( $data );
        } else {
            $this->goods = null;
        }
    }
}