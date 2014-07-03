<?php

namespace Classes\Model\VO;

class Consultation implements \Classes\Model\VO\VO{

    private $id;
    private $date;
    private $hour;
    private $idMedic;
    private $idPatient;
    private $observations;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getHour() {
        return $this->hour;
    }

    public function setHour($hour) {
        $this->hour = $hour;
    }

    public function getIdMedic() {
        return $this->idMedic;
    }

    public function setIdMedic($idMedic) {
        $this->idMedic = $idMedic;
    }

    public function getIdPatient() {
        return $this->idPatient;
    }

    public function setIdPatient($idPatient) {
        $this->idPatient = $idPatient;
    }

    public function getObservations() {
        return $this->observations;
    }

    public function setObservations($observations) {
        $this->observations = $observations;
    }

}
