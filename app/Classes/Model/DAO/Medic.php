<?php

namespace Classes\Model\DAO;

class Medic extends \Classes\Model\DAO\Database {

    private $table = "medic";
    private $fields = array(
        "name" => "PARAM_STR",
        "crm" => "PARAM_INT",
        "specialty" => "PARAM_STR",
    );

}
