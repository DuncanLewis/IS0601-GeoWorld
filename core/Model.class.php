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
     * General find functionality
     *
     * ToDo: convert to prepared statement execution
     * ToDo: implement LIMIT function - do this by converting $conditions to general $options
     * ToDo: $options will be an array containing conditions, limit, group by etc.
     * ToDo: perhaps we need to move this to some kind of queryBuilder method?
     *
     * @param string $level
     * @param $conditions
     * @return mixed
     */
    public function find($level = 'all', $conditions = null) {

        $conditionString = "";

        foreach ($conditions as $key => $value) {

            //If the current condition is a limit clause, dont include the " around $value
           if ($key == "LIMIT ") {
                $conditionString .= $key . ' ' . $value;
            } else {
               $conditionString .= $key . ' "' . $value . '" ';
           }
        }

        $query = "SELECT * FROM " . $this->_table . " WHERE " . $conditionString;
        $query = $this->query($query);

        $results = $this->resultArray($query);

        return $results;
    }

    /**
     * findById
     *
     * Finds a specific record
     *
     * ToDo: convert to prepared statement execution
     *
     * @param $id
     * @return array Model result array
     */
    public function findById($id) {
        $query = "SELECT * FROM " . $this->_table . " WHERE " . $this->_primary . " = '" . $id . "'";
        $query = $this->query($query);

        $results = $this->resultArray($query);

        //Reset the array pointer, i.e. move all values up one level as we only have one result to deal with
        $results = reset($results);
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


    /**
     * update
     *
     * Builds and executes an update query
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data) {

        foreach ($data as $field => $value) {
            $setArray[] = $field . ' = "' . $value . '"';
        }

        $setStatement = implode(', ', $setArray);

        $query = 'UPDATE ' . $this->_table . ' SET ' . $setStatement . ' WHERE A3Code = "' . $id . '"';
        $query = $this->query($query);

        $results = $this->execute($query);

        return $results;
    }

}