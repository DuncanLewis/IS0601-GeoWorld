<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 08/02/2017
 * Time: 01:56
 */
class CityController extends Controller
{


    public function index() {

        $cityList = $this->City->findAll();

        $this->set('cityList', $cityList);

    }


}