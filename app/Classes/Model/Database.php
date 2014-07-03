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

    public static function factory($type) {
        if (!isset($this->types[$type])) {
            throw new Exception("Invalid type");
        }

        return new $this->types[$type];
    }

}
