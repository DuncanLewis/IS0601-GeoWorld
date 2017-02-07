<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 18/01/2017
 * Time: 14:16
 */
class Model extends MySQL
{

    /**
     * @var string
     */
    protected $_model;

    /**
     * @var string
     */
    protected $_table;

    /**
     * @var
     */
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
     * find
     *
     * Finds a specific record
     *
     * ToDo: convert to prepared statement execution
     *
     * @param $id
     * @return array Model result array
     */
    public function find($id) {
        $query = "SELECT * FROM " . $this->_table . " WHERE " . $this->_primary . " = '" . $id . "'";
        $query = $this->query($query);

        $results = $this->resultArray($query);
        return $results;
    }


    /**
     * findAll
     *
     * Finds all records from a table
     *
     * @return mixed
     */
    public function findAll() {
        $query = "SELECT * FROM " . $this->_table;
        $query =  $this->query($query);

        $results = $this->resultArray($query);
        return $results;
    }

}