<?php

namespace Classes\Model\DAO;

class Patient implements \Classes\Model\Interface\DAO {

    private static $instance;
    private $query;
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new \Classes\Model\DAO\Patient;
        }

        return self::$instance;
    }

    public function insert(\Classes\Model\VO\Patient $patient) {
        try {
            $sql = "
                INSERT INTO patient(
                    name,
                    cpf,
                    sex,
                    dateOfBirth,
                    address
                ) VALUES (
                    :name,
                    :cpf,
                    :sex,
                    :dateOfBirth,
                    :address
                );
            ";

            $sql = \Classes\Model\Connection::getInstance()->prepare($sql);

            $sql->bindValue(":name", $patient->getName(), \PDO::PARAM_STR);
            $sql->bindValue(":cpf", $patient->getCpf(), \PDO::PARAM_INT);
            $sql->bindValue(":sex", $patient->getSex(), \PDO::PARAM_STR);
            $sql->bindValue(":dateOfBirth", $patient->getDateOfBirth(), \PDO::PARAM_STR);
            $sql->bindValue(":address", $patient->getAddress(), \PDO::PARAM_STR);

            return $sql->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function remove(\Classes\Model\VO\Patient $patient) {
        try {
            $sql = "DELETE FROM patient WHERE id = :id";

            $sql = \Classes\Model\Connection::getInstance()->prepare($sql);

            $sql->bindValue(":id", $patient->getId(), \PDO::PARAM_INT);

            return $sql->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function update(\Classes\Model\VO\Patient $pacient) {
        
    }

    public function select() {
        
    }

    public function where() {
        
    }

    public function execute() {
        
    }

    public function as_array() {
        
    }

}
