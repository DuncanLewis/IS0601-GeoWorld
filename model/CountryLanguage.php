<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 14/02/2017
 * Time: 12:53
 */
class CountryLanguage extends Model
{

    protected $_primary = "A3Code";


    public function getLanguageUsage($country = null, $limit) {

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