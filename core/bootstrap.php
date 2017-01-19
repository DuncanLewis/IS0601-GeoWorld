<?php
/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 19/01/2017
 * Time: 15:36
 */

//include our configuration file
$cnfPath = ROOT . DS . 'config.php';
require_once($cnfPath);

//Now we should autoload all classes using spl_autoload (a magical function!)
spl_autoload_register(function($className) {

    $root = ROOT . DS;
    $valid = false;

    //first we can check the root directory of /core to see if there are any files to load
    $valid = file_exists($classFile = $root . 'core' . DS . $className . '.class.php');

    // next check the application controllers
    if(!$valid){
        $valid = file_exists($classFile = $root . DS . 'controllers' . DS . $className . '.php');
    }

    // finally check the application models
    if(!$valid){
        $valid = file_exists($classFile = $root . DS . 'models' . DS . $className . '.php');
    }

    // if at this point $valid is true, include the file, else throw an error
    if($valid){
        require_once($classFile);
    }else{
        //ToDo: add error generation e.g. missing class exception
    }

});

// initialise the Router with the current route
$router = new Router($_route);

// finally we'll go ahead and dispatch
$router->dispatch();