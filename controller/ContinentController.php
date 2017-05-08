<?php

/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 31/01/2017
 * Time: 12:12
 */
class ContinentController extends Controller
{

    /**
     * Index
     *
     * Default action for ContinentController. Displays the continents list
     *
     */
    public function index() {

        $continentList = $this->Continent->findAll();

        $this->set('continentList', $continentList);
    }

    /**
     * View
     *
     * View action for ContinentController. Displays a specific continent and all countries within that continent
     *
     * @param $id ContinentController ID Continent
     */
    public function view($id) {

        $continent = $this->Continent->findById($id);


        //Register new CountryLanguage class so we can view the most widely used languages in a country
        $Country = new Country();

        $conditions = array(
            'Continent = ' => $id
        );
        $countryList = $Country->find('all', $conditions);

        $this->set('continent', $continent);
        $this->set('countryList', $countryList);
    }

}