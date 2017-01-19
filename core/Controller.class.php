<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 19/01/2017
 * Time: 16:38
 */
class Controller
{

    /**
     * _model
     *
     * @var
     */
    protected $_model;

    /**
     * _controller
     *
     * @var
     */
    protected $_controller;

    /**
     * _action
     *
     * @var
     */
    protected $_action;

    /**
     * config
     *
     * @var
     */
    public $config;

    /**
     * view
     *
     * @var
     */
    public $view;

    /**
     * table
     *
     * @var
     */
    public $table;

    /**
     * id
     *
     * @var
     */
    public $id;

    /**
     * database
     *
     * @var
     */
    public $database;


    /**
     * Controller constructor.
     *
     * @param string $model Model to be used
     * @param string $controller Controller to be used
     * @param string $action Action to use within the controller
     */
    public function __construct($model = 'Model', $controller = 'Controller', $action = 'index')
    {

        //Set configuration values from config.php
        global $config;
        $this->config = $config;

        $this->_controller = $controller;
        $this->_action = $action;

        $this->view = new View();


        $this->_model = new $model($this->database);
        $this->_model->controller = $this;
        $this->table = $controller;

    }

}