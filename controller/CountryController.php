<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 31/01/2017
 * Time: 12:11
 */
class CountryController extends Controller
{

    /**
     * Index
     *
     * Default action for CountryController. Displays the countries list
     *
     */
    public function index() {

        echo "Index";

    }

    /**
     * View
     *
     * View action for CountryController. Displays a specific country, specified by the country ID
     *
     * @param $id Id of the country
     */
    public function view($id) {

        echo($id);

    }

}