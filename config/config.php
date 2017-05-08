<?php
/**
 * config.php
 *
 * Define our database connection constants
 *
 */

//Default Database configuration
define("MYSQL_HOST", "127.0.0.1");
define("MYSQL_USERNAME", "unn_w13007828");
define("MYSQL_PASSWORD", "HMPXYLNB");
define("MYSQL_DATABASE", "unn_w13007828");
define("MYSQL_PREFIX", "w_");

//ToDo: make this actually grab the base url, rather than being hardcoded
define("BASE_URL", "http://unn-w13007828.newnumyspace.co.uk/geo/");
class DB_CONFIG {

    public $default = array(
        'hostname' => MYSQL_HOST,
        'port' => 3306,
        'username' =>  MYSQL_USERNAME,
        'password' => MYSQL_PASS,
        'prefix' => MYSQL_PREFIX
    );

}
