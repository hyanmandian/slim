<?php

namespace Classes\Model\DAO;

class Consultation implements \Classes\Model\DAO\DAO {

    private static $instance;
    private $query;
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new \Classes\Model\DAO\Consultation;
        }

        return self::$instance;
    }

    public function insert(\Classes\Model\VO\Consultation $consultation) {
        try {
            $sql = "
                INSERT INTO medic(
                    date,
                    hour,
                    idMedic,
                    idPatient,
                    observations
                ) VALUES (
                    :date,
                    :hour,
                    :idMedic,
                    :idPatient,
                    :observations
                );
            ";

            $sql = \Classes\Model\Connection::getInstance()->prepare($sql);

            $sql->bindValue(":date", $consultation->getDate(), \PDO::PARAM_STR);
            $sql->bindValue(":hour", $consultation->getHour(), \PDO::PARAM_STR);
            $sql->bindValue(":idMedic", $consultation->getIdMedic(), \PDO::PARAM_INT);
            $sql->bindValue(":idPatient", $consultation->getIdPatient(), \PDO::PARAM_INT);
            $sql->bindValue(":observations", $consultation->getObservations(), \PDO::PARAM_STR);

            return $sql->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function remove(\Classes\Model\VO\Consultation $consultation) {
        try {
            $sql = "DELETE FROM consultation WHERE id = :id";

            $sql = \Classes\Model\Connection::getInstance()->prepare($sql);

            $sql->bindValue(":id", $consultation->getId(), \PDO::PARAM_INT);

            return $sql->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function update(\Classes\Model\VO\Consultation $consultation) {
        
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
