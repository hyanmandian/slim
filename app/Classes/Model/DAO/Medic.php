<?php

namespace Classes\Model\DAO;

class Medic extends \Classes\Model\DAO\Database {

    protected $table = "medic";
    protected $fields = array(
        "name",
        "crm",
        "specialty",
    );

}
