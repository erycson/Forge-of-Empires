<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {        
        $registry = Zend_Registry::getInstance();
        $this->db = $registry->get( 'db' );
    }

    public function indexAction()
    {
    }
}

