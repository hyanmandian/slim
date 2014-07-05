<?php

namespace Classes\Model\DAO;

class Consultation extends \Classes\Model\DAO\Database {

    private $table = "consultation";
    private $fields = array(
        "date" => "PARAM_STR",
        "hour" => "PARAM_STR",
        "idMedic" => "PARAM_INT",
        "idPatient" => "PARAM_INT",
        "observations" => "PARAM_STR",
    );

}
