<?php

namespace Classes\Model\DAO;

class Patient extends \Classes\Model\DAO\Database {

    private $table = "patient";
    private $fields = array(
        "name" => "PARAM_STR",
        "cpf" => "PARAM_INT",
        "sex" => "PARAM_STR",
        "dateOfBirth" => "PARAM_STR",
        "address" => "PARAM_STR",
    );

}