<?php
/**
 * core/mysql.class.php
 *
 * Database connection and execution class - handles raw interactions with the database
 */

class MySQL {

    /**
     * MySQL Hostname
     *
     * @var string
     */
    private $host = MYSQL_HOST;

    /**
     * MySQL Database Name
     *
     * @var string
     */
    private $database = MYSQL_DATABASE;


    /**
     * MySQL Username
     *
     * @var string
     */
    private $username = MYSQL_USERNAME;


    /**
     * MySQL Password
     *
     * @var string
     */
    private $password = MYSQL_PASSWORD;


    private $dbHandler;

    private $error;


    /**
     * Statement
     *
     * Holds the statement to be executed on the database
     *
     * @var
     */
    private $statement;

    public function __construct()
    {
        //Set MySQL PDO DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;


        //Set PDO options
        $options = array(
            //Sets PDO to throw a PHP exception when an error occurs so we can handle errors g r a c e f u l l y
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );


        //Attempt a connection using the try catch block structure
        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

    }


    /**
     * Query
     *
     * Constructs the query to execute on the database
     *
     * @param $query
     */
    public function query($query) {
        $this->statement = $this->dbHandler->prepare($query);
    }


    /**
     * Bind
     *
     * Bind our given values and parameters together
     *
     * @param $param - The given name for the value within $statement in mysql::query
     * @param $value - The actual value to be inserted into the database
     * @param null $type - The given datatype for the value
     */
    public function bind($param, $value, $type = null)
    {

        //First we must determine datatype and convert this to a PDO datatype
        if (is_null($type)) {
            switch (true) {
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        //Now we will actually bind the values
        $this->statement->bindValue($param, $value, $type);
    }


    /**
     * Execute
     *
     * Executes a prepared statement
     *
     * @return mixed
     */
    public function execute() {
        //Execute and return the value of a prepared statement
        return $this->statement->execute();
    }


    /**
     * Result Array
     *
     * Returns an array of results from the query
     *
     * @return mixed
     */
    public function resultArray() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Result Single
     *
     * Return a single result from a given query
     *
     * @return mixed
     */
    public function resultSingle() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }


    public function resultRowCount() {
        return $this->statement->rowCount();
    }


    /**
     * Last Insert Id
     *
     * Returns the last ID inserted to the database, may be useful for displaying an alert after submitting form
     * e.g. when head of state is updated we can display the details that were inserted
     *
     * @return mixed
     */
    public function lastInsertId(){
        return $this->dbHandler->lastInsertId();
    }

    /**
     * Debug
     *
     * Dumps the information from the last prepared statement - useful for debugging a non-functioning query
     *
     * @return mixed
     */
    public function debug(){
        return $this->statement->debugDumpParams();
    }
}