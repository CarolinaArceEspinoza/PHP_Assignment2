<?php

class Database {
    private $connection;

    function __construct() {
        $this->connect_db();
    }

    // Connection to the database
    public function connect_db() {
        $this->connection = new mysqli('localhost', 'root', '', 'soccerCamp2');

        // Check the connection
        if ($this->connection->connect_error) {
            die("Database Connection Failed: " . $this->connection->connect_error);
        }

        // Set the character set
        $this->connection->set_charset("utf8");
    }

    public function getData($query) {
        $result = $this->connection->query($query);
        if ($result === false) {
            return false;
        }

        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function execute($query) {
        $result = $this->connection->query($query);
        if ($result === false) {
            echo 'Error: cannot execute the command';
            return false;
        } else {
            return true;
        }
    }

    public function delete($id) {
        $query = "DELETE FROM player WHERE id = '$id'";
        $result = $this->connection->query($query);
        if ($result) {
            header("Location:view.php?msg3=delete");
          }else{
            echo "Record was not deleted, try again";
          }
    }

    public function displayRecordById($id){
    $query = "SELECT * FROM player WHERE id = '$id' LIMIT 1";
    $result = $this->connection->query($query);
    
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }

}

$database = new Database();
?>
