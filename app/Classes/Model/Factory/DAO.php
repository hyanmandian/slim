<?php

namespace Classes\Model\Factory;

class DAO {

    private $types = array();

    public function __construct() {
        $this->configureDefaults();
    }

    private function configureDefaults() {
        $this->setClass("patient", "\Classes\Model\DAO\Patient");
        $this->setClass("medic", "\Classes\Model\DAO\Medic");
        $this->setClass("consultation", "\Classes\Model\DAO\Consultation");
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
