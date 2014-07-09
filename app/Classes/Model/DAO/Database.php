<?php

namespace Classes\Model\DAO;

class Database {

    protected $query;
    protected $table;
    protected $fields;

    public function insert(\Classes\Model\Interfaces\VO $vo) {
        $this->query = "INSERT INTO " . $this->table . "(" . implode(",", $this->fields) . ") VALUES (";

        foreach ($this->fields as $fields) {
            if (end($this->fields) === $fields) {
                $this->query.= ":" . $fields;
            } else {
                $this->query.= ":" . $fields . ",";
            }
        }

        $this->query.= ")";

        $this->query = \Classes\Model\Connection::getInstance()->prepare($this->query);

        foreach ($this->fields as $field) {
            $method = "get" . ucfirst($field);
            $this->query->bindValue($field, $vo->{$method}());
        }

        return $this;
    }

    public function remove(\Classes\Model\Interfaces\VO $vo) {
        $this->query = "DELETE FROM " . $this->table . " WHERE id = :id";

        $this->query = \Classes\Model\Connection::getInstance()->prepare($this->query);

        $this->query->bindValue(":id", $vo->getId());

        return $this;
    }

    public function update(\Classes\Model\Interfaces\VO $vo) {
        $this->query = "UPDATE " . $this->table . " SET ";

        foreach ($this->fields as $field) {
            if (end($this->fields) == $field) {
                $this->query.= $field . " = :" . $field;
            } else {
                $this->query.= $field . " = :" . $field . ",";
            }
        }

        $this->query.= " WHERE id = :id";
        
        $this->query = \Classes\Model\Connection::getInstance()->prepare($this->query);

        foreach ($this->fields as $field) {
            $method = "get" . ucfirst($field);
            $this->query->bindValue($field, $vo->{$method}());
        }
        
        $this->query->bindValue("id", $vo->getId());
        
        return $this;
    }

    public function select($fields = NULL) {
        $fields = $fields == NULL ? "*" : $fields;
        $this->query = "SELECT " . $fields . " FROM " . $this->table;
        return $this;
    }

    public function where($field, $conditional, $value) {
        if (strpos($this->query, "WHERE") !== FALSE) {
            $this->query.= " AND " . $field . " " . $conditional . " " . $value;
        } else {
            $this->query.= " WHERE " . $field . " " . $conditional . " " . $value;
        }
        return $this;
    }

    public function execute() {
        if (!is_object($this->query)) {
            try {
                return \Classes\Model\Connection::getInstance()->query($this->query)->fetchAll();
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
