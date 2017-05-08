<?php
/**
 * Created by PhpStorm.
 * User: duncan
 * Date: 18/01/2017
 * Time: 10:56
 */

// First we have to check if session is started, if it isn't then start session
if(session_id() === ""){
    session_start();
}

// now lets define our directory separator
define('DS', DIRECTORY_SEPARATOR);
// next we can define the application path
define('ROOT', dirname(dirname(__FILE__)));

// the routing url, we need to use original 'QUERY_STRING' from server paramater because php has parsed the url if we use $_GET
$_route = isset($_GET['_route']) ? preg_replace('/^_route=(.*)/','$1',$_SERVER['QUERY_STRING']) : '';

// finally we can dispatch the request to the core bootstrap file
require_once (ROOT . DS . 'core' . DS . 'bootstrap.php');