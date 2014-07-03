<?php

namespace Classes\Model\DAO;

class Medic implements \Classes\Model\DAO\DAO {

    private static $instance;
    private $query;
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new \Classes\Model\DAO\Medic;
        }

        return self::$instance;
    }

    public function insert(\Classes\Model\VO\Medic $medic) {
        try {
            $sql = "
                INSERT INTO medic(
                    name,
                    crm,
                    specialty
                ) VALUES (
                    :name,
                    :crm,
                    :specialty
                );
            ";

            $sql = \Classes\Model\Connection::getInstance()->prepare($sql);

            $sql->bindValue(":name", $medic->getName(), \PDO::PARAM_STR);
            $sql->bindValue(":crm", $medic->getCrm(), \PDO::PARAM_INT);
            $sql->bindValue(":specialty", $medic->getSpecialty(), \PDO::PARAM_STR);

            return $sql->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function remove(\Classes\Model\VO\Medic $medic) {
        try {
            $sql = "DELETE FROM medic WHERE id = :id";

            $sql = \Classes\Model\Connection::getInstance()->prepare($sql);

            $sql->bindValue(":id", $medic->getId(), \PDO::PARAM_INT);

            return $sql->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function update(\Classes\Model\VO\Medic $medic) {
        
    }

    public function select() {
    }
    
    public function where(){
        
    }
    
    public function execute(){
    }
    
    public function as_array(){
    }
    
}
