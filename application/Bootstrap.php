<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRouters() {
        $front  = Zend_Controller_Front::getInstance();
        $router = $front->getRouter();
        
        $route_file = new Zend_Controller_Router_Route(
            'file/:id/:name',
            array(
                'controller'=> 'file',
                'action'    => 'index'
            ),
            array ( 'id' => '\d+' )
        );
        
        $route_download = new Zend_Controller_Router_Route(
            'download/:id',
            array(
                'controller'=> 'download',
                'action'    => 'index'
            ),
            array ( 'id' => '\d+' )
        );
        
        $router->addRoute( 'file', $route_file );
        $router->addRoute( 'download', $route_download );
    }
    
    protected function _initConnection() {
        $config = new Zend_Config_Ini( '../application/configs/application.ini', 'production' );
        
        try{
            $db = Zend_Db::factory( $config->database );
            
            $registry = Zend_Registry::getInstance();
            $registry->set( 'db', $db );
            Zend_Db_Table::setDefaultAdapter( $db );
            
        }catch( Zend_Db_Exception $e ){
            echo "Lamentamos, mas o servidor está em manutenção.";
            exit;
        }
    }
}

