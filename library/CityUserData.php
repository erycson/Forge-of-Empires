<?php

class CityUserData {
    public $player_id = 0;
    public $city_name = '';
    public $user_name = '';
    public $era;
    public $is_tester = false;
    public $profile_text = '';
    public $portrait_id = '';
    public $rank = null;
    public $clan_id = null;
    public $clan_name = '';
    public $email_validated = false;
    public $time_left_to_validate_email = false;
    public $has_new_event = false;
    public $has_new_inventory_item = false;
    public $has_new_neighbors = false;
    public $clan_permissions = null;
    
    public function __construct( $data ) {
        global $db;
        
        if ( !is_array( $data ) ) {
            $query = $db->query( "SELECT * FROM player WHERE player_id={$data}" );
            $data = $query->fetch();
        }
        
        $this->player_id = (int) $data['player_id'];
        $this->city_name = $data['city_name'];
        $this->user_name = $data['user_name'];
        $this->era = isset( $data['era'] ) ? new Era( $data['era'] ) : null;
        $this->is_tester = (bool) $data['is_tester'];
        $this->profile_text = $data['profile_text'];
        $this->portrait_id = $data['portrait_id'];
        $this->rank = null;
        $this->clan_id = $data['clan_id'];
        $this->clan_name = @$data['clan_name'];
        $this->email_validated = (bool) $data['email_validated'];
        $this->time_left_to_validate_email = (bool) $data['time_left_to_validate_email'];
        $this->has_new_event = (bool) $data['has_new_event'];
        $this->has_new_inventory_item = (bool) $data['has_new_inventory_item'];
        $this->has_new_neighbors = (bool) $data['has_new_neighbors'];
        $this->clan_permissions = null;
    }
}