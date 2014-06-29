<?php 

namespace Classes\Model;

class Database {

    private $database;
    private $config = array(
        "driver" => "pgsql",
        "host" => "localhost",
        "database" => "gb",
        "user" => "root",
        "password" => "123",
    );

    private function getDns() {
        return $this->config["driver"] . ":dbname=" . $this->config["database"] . ";host=" . $this->config["host"];
    }

    public function __construct() {
        $this->database = new \PDO($this->getDns(), $this->config["user"], $this->config["password"]);
    }

}
