<?php

namespace Classes\Model\DAO;

class Database {

    private $query;
    private $table;
    private $fields = array();

    public function insert(\Classes\Model\Interfaces\VO $vo) {
        try {
            $this->query = "INSERT INTO " . $this->table . "(" . implode(",", array_keys($this->fields)) . ") VALUES (";

            foreach ($this->fields as $key => $value) {
                if (end($this->fields) == $key) {
                    $this->query.= ":" . $key;
                } else {
                    $this->query.= ":" . $key . ",";
                }
            }
            
            $this->query.= ")";
            
            $this->query = \Classes\Model\Connection::getInstance()->prepare($this->query);

            foreach ($this->fields as $key => $rule) {
                $this->query->bindValue($value, call_user_func($vo, "get" . ucfirst($key)), call_user_func("\PDO", "::" . $rule));
            }
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function remove(\Classes\Model\Interfaces\VO $vo) {
        try {
            $this->query = "DELETE FROM " . $this->table . " WHERE id = :id";

            $this->query = \Classes\Model\Connection::getInstance()->prepare($this->query);

            $this->query->bindValue(":id", $vo->getId(), \PDO::PARAM_INT);
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function update(\Classes\Model\Interfaces\VO $vo) {
        try {
            $this->query = "UPDATE " . $this->table . " SET ";

            foreach ($this->fields as $field) {
                if (end($this->fields) == $key) {
                    $this->query.= $key . " = :" . $key;
                } else {
                    $this->query.= $key . " = :" . $key . ",";
                }
            }

            $this->query.= "WHERE id = :id";

            $this->query = \Classes\Model\Connection::getInstance()->prepare($this->query);

            foreach ($this->fields as $key => $rule) {
                $this->query->bindValue($value, call_user_func($vo, "get" . ucfirst($key)), call_user_func("\PDO", "::" . $rule));
            }
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function select($fields = NULL) {
        $fields !== NULL ? "*" : $fields;

        $this->query = "SELECT " . $fields . " FROM " . $this->table;
    }

    public function where($field, $conditional, $value) {
        if (strpos($this->query, "WHERE")) {
            $this->query.= "AND WHERE " . $field . " " . $conditional . " " . $value;
        }else{
            $this->query.= " WHERE " . $field . " " . $conditional . " " . $value;
        }
    }

    public function execute() {
        if (strpos($this->query, "SELECT")) {
            try {
                return \Classes\Model\Connection::getInstance()->query($this->query);
            } catch (\PDOException $e) {
                throw $e;
            }
        }

        try {
            return $this->query->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }
}
