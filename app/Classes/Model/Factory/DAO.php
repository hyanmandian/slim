<?php

namespace Classes\Model\Factory;

class DAO {
    
    public static function factory($type) {
        switch ($type){
            case "patient":
                return new \Classes\Model\DAO\Patient;
            case "medic":
                return new \Classes\Model\DAO\Medic;
            case "consultation":
                return new \Classes\Model\DAO\Consultation;
            default :
                throw new Exception("Classe não existe");
        }
    }

}
