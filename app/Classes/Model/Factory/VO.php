<?php

namespace Classes\Model\Factory;

class VO {

    public static function factory($type) {
        switch ($type) {
            case "patient":
                return new \Classes\Model\VO\Patient;
            case "medic":
                return new \Classes\Model\VO\Medic;
            case "consultation":
                return new \Classes\Model\VO\Consultation;
            default :
                throw new Exception("Classe não existe");
        }
    }
}
