<?php

namespace Classes\Model;

class Database {

    private $types = array();

    public function __construct() {
        $this->configureDefaults();
    }

    private function configureDefaults() {
        $this->setClass("patient", "Patient");
        $this->setClass("medic", "Medic");
        $this->setClass("consultation", "Consultation");
    }

    private function setClass($type, $class) {
        if (!class_exists($class, TRUE)) {
            throw new Exception("Invalid type");
        }

        $this->types[$type] = $class;
    }

    public static function factory($vo) {
        if (!isset($this->types[$tipo])) {
            throw new Exception("Invalid type");
        }

        return new $this->types[$tipo];
    }

}
