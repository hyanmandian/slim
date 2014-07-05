<?php

namespace Classes\Model\VO;

class Medic implements \Classes\Model\Interfaces\VO{

    private $id;
    private $name;
    private $crm;
    private $specialty;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCrm() {
        return $this->crm;
    }

    public function setCrm($crm) {
        $this->crm = $crm;
    }

    public function getSpecialty() {
        return $this->specialty;
    }

    public function setSpecialty($specialty) {
        $this->specialty = $specialty;
    }

}
