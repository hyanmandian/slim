<?php

namespace Classes\Model;

class Connection {

    public static $config = array(
        "driver" => "pgsql",
        "host" => "localhost",
        "dbname" => "work",
        "user" => "postgres",
        "password" => "postgres",
    );
    
    private static $instance;

    private static function getDns() {
        return self::$config["driver"] . ":" . "dbname=" . self::$config["dbname"] . ";host=" . self::$config["host"];
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new \PDO(self::getDns(), self::$config["user"], self::$config["password"]);
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                throw $e;
            }
        }

        return self::$instance;
    }

}
