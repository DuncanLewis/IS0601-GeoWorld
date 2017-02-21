<?php
/**
 * config/mysql.class.php
 *
 * Define our database connection constants
 *
 */

//Default Database configuration
define("MYSQL_HOST", "127.0.0.1");
define("MYSQL_USERNAME", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "geodata");
define("MYSQL_PREFIX", "W_");

//ToDo: make this actually grab the base url, rather than being hardcoded
define("BASE_URL", "www.piranhr.dev");
class DB_CONFIG {

    public $default = array(
        'hostname' => MYSQL_HOST,
        'port' => 3306,
        'username' =>  MYSQL_USERNAME,
        'password' => MYSQL_PASS,
        'prefix' => MYSQL_PREFIX
    );

}
