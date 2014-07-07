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

    public function select($fields = NULL) {
        $fields = $fields == NULL ? "*" : $fields;
        $this->query = "SELECT " . $fields . " FROM " . $this->table;
        return $this;
    }
}
