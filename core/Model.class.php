<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 18/01/2017
 * Time: 14:16
 */
class Model extends MySQL
{

    protected $_model;

    protected $_table;

    protected $_primary;

    /**
     * Model constructor.
     *
     *
     */
    public function __construct()
    {

        parent::__construct();

        //get the current model using get_class
        $this->_model = get_class($this);

        //Get the current table by converting this model
        $this->_table = MYSQL_PREFIX . $this->_model;

    }


    /**
     * Model find
     *
     * Finds a specific country
     *
     * ToDo: convert to prepared statement execution
     *
     * @param $id
     * @return array Model result array
     */
    public function find($id) {
        $query = "SELECT * FROM " . $this->_table . " WHERE " . $this->_primary . " = '" . $id . "'";

        echo $query;
        $query = $this->query($query);

        $results = $this->resultArray($query);
        return $results;
    }


    public function findAll() {
        $query = "SELECT * FROM " . $this->_table;
        $query =  $this->query($query);

        $results = $this->resultArray($query);

        return $results;
    }

}