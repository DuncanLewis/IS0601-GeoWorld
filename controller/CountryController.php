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

        $countryList = $this->Country->findAll();

        $this->set('countryList', $countryList);
    }

    /**
     * View
     *
     * View action for CountryController. Displays a specific country, specified by the country ID
     *
     * @param $id CountryController ID of the country
     */
    public function view($id) {

        $country = $this->Country->find($id);

        $this->set('country', $country);
    }


    /**
     * Search
     *
     * Search action, allows the users to search for a
     *
     * @param $query CountryController must be a minimum 3 in length
     */
    public function search($query) {

        //Check if string is under 3 characters long, if so then error ToDo: check if this needs to be less than or <=
        if (strlen($query) < 3) {
            echo "Please enter search query longer than 3 characters."; //Todo make a proper error handler
        }

        //Call to the model method for search

        //Return results to the page

    }

}