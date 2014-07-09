<?php

namespace Classes\Model\DAO;

class Consultation extends \Classes\Model\DAO\Database {

    protected $table = "consultation";
    protected $fields = array(
        "date",
        "hour",
        "idMedic",
        "idPatient",
        "observations",
    );

    public function select($fields = NULL, $especial = TRUE) {
        $fields = $fields == NULL ? "*" : $fields;
        
        if ($especial) {
            $this->query = "SELECT consultation.id as id, date, hour, patient.name as patient, medic.name as medic, observations
                            FROM " . $this->table . " 
                            JOIN patient ON patient.id = consultation.idpatient
                            JOIN medic ON medic.id = consultation.idmedic";
        } else {
            $this->query = "SELECT " . $fields . " FROM " . $this->table;
        }
        return $this;
    }

}
