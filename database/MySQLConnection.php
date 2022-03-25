<?php

namespace Database;
require_once '../contracts/iDBConnection.php';
use Contracts\iDBConnection;
use mysqli;

class MySQLConnection implements iDBConnection
{
    private $host; ///host name of db
    private $username; //username of db user
    private $password; //password of db user
    private $dbname; //database name
    public $conn = NULL; //connection to db result
    public $query = NULL; //query to be executed
    public $result = NULL; //query result
    private static $instance = NULL; //instance that will be used in static method to create object in singleton class

    /**
     * [construct Private so nobody else can instantiate it]
     */
    private function __construct()
    {
        $db_config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/db.ini');
        $this->host = $db_config['host'];
        $this->username = $db_config['username'];
        $this->password = $db_config['password'];
        $this->dbname = $db_config['dbname'];

        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        $this->conn->set_charset("utf8");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_errno);
        }
    }

    /*
              @description create instance from class to be used as object
              @return object MySqlDbConnection instance
    */

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new MySQLConnection();
        }

        return self::$instance;
    }

    /*
              @description execute of the inserted query to db
              @param  string $query a string of query
              @param  string $type the string of inserted params types with default NULL
              @param  array $param the params and values of the query with default NULL
              @return array  $result is an array of executed query result
    */

    public function queryExecute($query, $type = NULL, $param = NULL)
    {
        $this->query = $this->conn->prepare($query);
        if ($type) {
            $this->query->bind_param($type, ...$param);
        }
        $this->query->execute();

        $this->result = $this->query->get_result();

        return $this->result;
    }

    /*
              @description the number of rows of query result
              @return int  the number of rows of selected query
    */

    public function numRows()
    {
        return $this->result->num_rows;
    }

    /*
              @description the number of affected rows of the query result
              @return int  the number of affected rows at the db by last executed query
    */

    public function affectedRows()
    {
        return $this->conn->affected_rows;
    }

    /*
              @description return an object of one row from of the executed query
              @return object() set of one row of the query result
    */

    public function fetchOne()
    {
        return $this->result->fetch_object();
    }

    /*
              @description return an array of results of the executed query
              @return array() set of array results of the query
    */

    public function fetchAll()
    {
        return $this->result->fetch_assoc();
    }

    /*
              @description return last id inserted in the db
              @return int  the id of last inserted id of the last insert query
    */

    public function getLastInsertedId()
    {
        return $this->conn->insert_id;
    }

    /*
              @description close the opened connection with db
              @return boolean true or false dependent on success or failure of the closing process
    */

    public function connClose() : bool
    {
        return $this->conn->close();
    }

    /*
              @description class destructor
    */

    public function __destruct()
    {
        $this->connClose();
    }

}