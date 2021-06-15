<?php

//the name of the file has to be the same as the name of the class
class Dbconnection{

    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "becode";
    private $db = "products";

    public function connect() {
        $dsn = 'mysql:host=' . $this->dbhost . ';db=' . $this->db;
        $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
    // function openConnection(): PDO
    // {
    //     // No bugs in this function, just use the right credentials.
    //     $dbhost = "localhost";
    //     $dbuser = "root";
    //     $dbpass = "mickD1978";
    //     $db = "import";

    //     $driverOptions = [
    //         PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    //         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //     ];

    //     return new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);
    // }

}
?>