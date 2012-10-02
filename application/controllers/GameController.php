<?php

define( 'LIBRARYN_PATH', APPLICATION_PATH . '/../library/' );

require_once LIBRARYN_PATH . 'CityGood.php';
require_once LIBRARYN_PATH . 'CityEntity.php';
require_once LIBRARYN_PATH . 'CityEntityResidentialBuilding.php';
require_once LIBRARYN_PATH . 'CityEntityDecoration.php';
require_once LIBRARYN_PATH . 'CityEntityTileset.php';
require_once LIBRARYN_PATH . 'CityEntityTilesetVictory.php';
require_once LIBRARYN_PATH . 'CityEntityMainBuilding.php';
require_once LIBRARYN_PATH . 'CityEntityCultureBuilding.php';
require_once LIBRARYN_PATH . 'CityEntityGoodsBuilding.php';
require_once LIBRARYN_PATH . 'CityEntityStreet.php';
require_once LIBRARYN_PATH . 'CityEntityRequirements.php';
require_once LIBRARYN_PATH . 'Settings.php';
//require_once LIBRARYN_PATH . '.php';
//require_once LIBRARYN_PATH . '.php';
//require_once LIBRARYN_PATH . '.php';
//require_once LIBRARYN_PATH . '.php';
require_once LIBRARYN_PATH . 'StrategyPoints.php';
require_once LIBRARYN_PATH . 'Era.php';
require_once LIBRARYN_PATH . 'Friend.php';
require_once LIBRARYN_PATH . 'PremiumPackage.php';
require_once LIBRARYN_PATH . 'Army.php';
require_once LIBRARYN_PATH . 'ArmyUnit.php';
require_once LIBRARYN_PATH . 'BattleUnitType.php';
require_once LIBRARYN_PATH . 'QuestSuccessCondition.php';
require_once LIBRARYN_PATH . 'QuestReward.php';
require_once LIBRARYN_PATH . 'OtherPlayerService.php';
require_once LIBRARYN_PATH . 'SocialInteraction.php';
require_once LIBRARYN_PATH . 'SocialInteractionHistory.php';
require_once LIBRARYN_PATH . 'SupportOutcome.php';

error_reporting( E_ALL );
$db = null;

class GameController extends Zend_Controller_Action
{
    private $amf;

    public function init()
    {
        global $db;
        
        Zend_Loader::loadFile( 'ServerResponse.php' );
        Zend_Loader::loadFile( 'CityUserData.php' );
        
        Zend_Loader::loadFile( 'QuestService.php' );
        Zend_Loader::loadFile( 'TimeService.php' );
        Zend_Loader::loadFile( 'RankingService.php' );
        Zend_Loader::loadFile( 'StartupService.php' );
        
        Zend_Loader::loadFile( 'CityResource.php' );
        
        Zend_Loader::loadFile( 'Quest.php' );
        Zend_Loader::loadFile( 'QuestGiver.php' );
        Zend_Loader::loadFile( 'Startup.php' );
        Zend_Loader::loadFile( 'CityMap.php' );
        Zend_Loader::loadFile( 'IdleState.php' );
        Zend_Loader::loadFile( 'CityMapEntity.php' );
        Zend_Loader::loadFile( 'CityMapUnlockedArea.php' );
        
        $registry = Zend_Registry::getInstance();
        $db = $registry->get( 'db' );
        
        $this->amf = new Zend_Amf_Server();
        $this->amf->setClass( 'AmfGateway' );
    }

    public function amfAction()
    {
        echo $this->amf->handle();
    }
}

class AmfGateway
{
    public function call( $param )
    {
        $return = array();
        
        $return[] = new ServerResponse( 'QuestService', 'getUpdates' );
        $return[] = new ServerResponse( 'TimeService', 'updateTime' );
        $return[] = new ServerResponse( 'RankingService', 'newRank' );
        $return[] = new ServerResponse( 'OtherPlayerService', 'updateActions' );
        $return[] = new ServerResponse( 'OtherPlayerService', 'update' );
        $return[] = new ServerResponse( 'StartupService', 'getData' );
        
        return $return;
    }
}