<?php

namespace Classes\Model;

class Database {

    public static function factory($vo) {
        $class = NULL;

        switch ($vo) {
            case "Patient":
                $class = new \Classes\Model\DAO\Patient;
                break;
            case "Medic":
                $class = new \Classes\Model\DAO\Medic;
                break;
            case "Consultation":
                $class = new \Classes\Model\DAO\Consultation;
                break;
            default:
                throw new Exception("Class not exist");
        }

        if ($class instanceof \Classes\Model\DAO\DAO) {
            return $class;
        } else {
            throw new Exception("Class not exist");
        }
    }
}
