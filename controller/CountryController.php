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

        $capitalId = $country['Capital'];

        //Register City class so we can lookup the countries biggest cities, and the countries capital city
        $City = new City();
        $capitalCity = $City->findById($capitalId);
        $largestCities = $City->getLargest($country['A3Code'], 5);

        //Register new CountryLanguage class so we can view the most widely used languages in a country
        $CountryLanguage = new CountryLanguage();
        $topLanguages = $CountryLanguage->getLanguageUsage($id, 10);

        $this->set('country', $country);
        $this->set('capitalCity', $capitalCity);
        $this->set('largestCities', $largestCities);
        $this->set('topLanguages', $topLanguages);
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

        //Set our conditions array using wildcard operators
        $conditions = array(
            'Name LIKE' => "%" . $query . "%"
        );

        //Call to the model method for search
        $countryList = $this->Country->find('all', $conditions);

        //Check countryList length, if only one result is found then we have an exact match
        if (count($countryList) === 1) {
            $country = $countryList[0]['A3Code'];
            $this->redirect('country', 'view', array($country));
        }

        //Return results to the page
        $this->set('countryList', $countryList);

        //Also return the original query to show some context for user
        $this->set('searchQuery', $query);

    }

}