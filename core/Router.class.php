<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 19/01/2017
 * Time: 15:54
 */
class Router
{

    //First define route variables (these should be protected access)

    /**
     * _controller
     *
     * @var string
     */
    protected $_controller;

    /**
     * _action
     *
     * @var string
     */
    protected $_action;

    /**
     * _view
     *
     * @var string
     */
    protected $_view;

    /**
     * _parameters
     *
     * @var array
     */
    protected $_parameters;

    /**
     * _route
     *
     * @var string
     */
    protected $_route;


    /**
     * Router constructor.
     * @param $_route
     */
    public function __construct($_route)
    {
        $this->_route = $_route;
        $this->_controller = 'Controller';
        $this->_action = 'index';
        $this->_parameters = array();
        $this->_view = false;

    }


    /**
     * getRoute
     *
     * @return mixed
     */
    public function getRoute()
    {
        $id = null;

        $urlArr = array();

        if(isset($this->_route)) {
            $urlArr = explode('/', $this->_route);

            //Set $this->_controller to the first part of the route
            $this->_controller = isset($urlArr[0]) ? $urlArr[0] : '';
            array_shift($urlArr);

            //Now set $this->_action to the second part of route
            $this->_action = isset($urlArr[0]) ? $urlArr[0] : '';
            array_shift($urlArr);

            //Now we are left with parameters of the query, set these to an array
            //ToDo: figure out how to make this get all paramters not just the first
            $this->_parameters = isset($urlArr[0]) ? $urlArr[0] : '';

            //Now we must check if controller is empty, if so then send to default controller (e.g. homepage)

            //Next if action is empty assume action is 'index' -- duplication effort here
            if (empty($this->_action)) {
                $this->_action = 'index';
            }

            $controllerName = ucfirst($this->_controller);

            $modelName = ucfirst($this->_controller);

            //ToDo: fix - not working as we are left with a ? after the name of the controller. E.g. Country?Controller is called
            $this->_controller = $controllerName . 'Controller';

            $dispatch = new $this->_controller($modelName, $controllerName, $this->_action);


            if ((int)method_exists($this->_controller, $this->_action)) {
                call_user_func_array(array($dispatch, $this->_action), array($this->_parameters));
            } else {
                //ToDo: add exception throw
            }

        }

        return $this->_route;
    }

}