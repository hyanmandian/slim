<?php

namespace Classes\Model\DAO;

class Patient extends \Classes\Model\DAO\Database {

    protected $table = "patient";
    protected $fields = array(
        "name",
        "cpf",
        "sex",
        "dateofbirth",
        "address",
    );
    
}