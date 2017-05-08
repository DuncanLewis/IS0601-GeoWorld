<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 08/02/2017
 * Time: 01:58
 */
class City extends Model
{

    protected $_primary = "ID";

    /**
     * getLargest
     *
     * Gets the largest cities (by population)
     *
     * @param null $country string City - Specify a country to restrict results to (A3Code Only)
     * @param $limit int City - Limit number of results to be returned
     * @return array City list
     */
    public function getLargest($country = null, $limit) {

        if (isset($country)) {
            $conditions = array(
                'A3Code LIKE' => $country,
                'LIMIT ' => $limit
            );
        }

        $result = $this->find('all', $conditions);

        return $result;

    }

}