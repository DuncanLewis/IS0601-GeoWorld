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

        $country = $this->Country->findById($id);

        $this->set('country', $country);

        //Register City class so we can lookup the countries biggest cities
        //ToDo: implement the Limit in the getLargest method
        $City = new City();
        $largestCities = $City->getLargest($country['A3Code'], 5);

        $this->set('largestCities', $largestCities);
    }


    /**
     * Search
     *
     * Search action, allows the users to search for a
     *
     * @param $query CountryController must be a minimum 3 in length
     */
    public function search($query) {

        $query = $_POST['countryQuery'];

        //Check if string is under 3 characters long, if so then error ToDo: check if this needs to be less than or <=
        if (strlen($query) < 3) {
            echo "Please enter search query longer than 3 characters."; //Todo make a proper error handler
        }

        //ToDo: Like isnt the best operator here, perhaps try implementing wildcard
        $conditions = array(
            'Name LIKE' => $query
        );

        //Call to the model method for search
        $countryList = $this->Country->find('all', $conditions);

        //Return results to the page
        $this->set('countryList', $countryList);

        //Also return the original query to show some context for user
        $this->set('searchQuery', $query);

    }

}