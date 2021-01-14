<?php

/**
 * Data base Connection using 
 * DIP = Dependency Inversion Principle
*/

interface DBConnectionI {
    public function connect();
}

class MySqlDataBase implements DBConnectionI {
    private $pdo;

    public function connect(): PDO {
        if ($this -> pdo == null) {
            // Custom error message for connection failure 
            // (also prevent from data leak)
            try {
                // Connect to the database
                $this -> pdo = new PDO('mysql:host='. HOST . ';dbname=' . DB, USER, PASSWORD, [
                    PDO :: MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]);

                // Set error mode
                $this -> pdo -> setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo "<h2>Error connecting to DataBase</h2>";
            }
        }

        return $this -> pdo;
    }
}