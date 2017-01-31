<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 31/01/2017
 * Time: 12:14
 */
class View
{

    protected $vars = array();

    protected $_controller;

    protected $_action;


    function __construct($controller, $action)
    {

        $this->_controller = $controller;
        $this->_action = $action;

    }


    public function set($varName, $varValue)
    {
        $this->vars[$varName] = $varValue;
    }


    public function renderView()
    {
        //first extract our variables which have been set by set method
        extract($this->vars);

        //Now load the view files associated with current controller / action (best to check if the file exists first to prevent an ugly error)
        if (file_exists(ROOT . DS . 'view' . DS . 'layout' . DS . 'header.php')) {
            include(ROOT . DS . 'view' . DS . 'layout' . DS . 'header.php');
        }

        if (file_exists(ROOT . DS . 'view' . DS . 'layout' . DS . 'footer.php')) {
            include(ROOT . DS . 'view' . DS . 'layout' . DS . 'footer.php');
        }

    }

}