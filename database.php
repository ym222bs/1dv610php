<?php

require_once('new_config.php');


class Database {

    private $connection;

    function __construct() {

        $this->open_db_connection();
    }

    public function getConnection () {
        return $this->connection;
    }
    

    public function open_db_connection() {

         $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        if($this->connection->connect_error) {
            die("database failed" . $this->connection->connect_error);
        }
    }
    // $sql = SQL Sträng med query instruktion.
    public function query($sql) {
        
        $result = mysqli_query($this->connection, $sql);
        // $result =  mysqli_escape_string($this->connection, $sql);
        
        if(!$result) {
            die('Query failed.');
        }
        return $result;

    }

    // public function escapeStringForMySQLQuery($string) {

    //   $escaped_string = mysqli_escape_string($this->connection, $string);
    //   return $escaped_string;
    // }
}
// $database = new Database();
?>