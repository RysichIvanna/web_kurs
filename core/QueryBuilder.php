<?php

namespace core;

use PDO;

class QueryBuilder {
    protected $connection;

    protected $tableName;
    protected $statementParams;

    protected $primaryPart;
    protected $wherePart;
    protected $orderByPart;
    
    public function __construct(PDO $connection, $tableName) {
        $this->connection = $connection;
        $this->tableName = $tableName;
        $this->statementParams = [];
    }

    public function select($fields = "*") {
        if (is_array($fields)) {
            $fields = implode(', ', $fields);
        }
        $this->primaryPart = "SELECT $fields FROM $this->tableName ";

        return $this;
    }
    public function insert($params) {
        $fields = implode(", ", array_keys($params));
        foreach ($params as $key => $value) {
            $paramKey = ":insert$key";
            $this->statementParams[$paramKey] = $value;
            $valuesParts[] = $paramKey;
        }
        $values = implode(", ", $valuesParts);
        $this->primaryPart = "INSERT INTO $this->tableName ($fields) VALUES ($values) ";
        return $this;
    }
    public function update($params) {
        foreach ($params as $key => $value) {
            $param = ":update$key";
            $this->statementParams[$param] = $value;
            $valuesParts[] = "$key = $param";
        }
        $values = implode(", ", $valuesParts);
        $this->primaryPart = "UPDATE $this->tableName SET $values ";
        return $this;
    }
    public function delete() {
        $this->primaryPart = "DELETE FROM $this->tableName ";
        return $this;
    }

    public function where($params, $condition = null) {
        if ($condition) {
            $this->statementParams = array_merge($this->statementParams, $params);
        }
        else {
            foreach ($params as $key => $value) {
                $param = ":where$key";
                $this->statementParams[$param] = $value;
                $conditionParts[] = "$key = $param";
            }
            $condition = implode(" AND ", $conditionParts);
        }
        $this->wherePart = "WHERE $condition ";
        return $this;
    }
    public function orderBy($fields) {
        if (is_array($fields)) {
            $fields = implode(', ', $fields);
        }
        $this->orderByPart = "ORDER BY $fields ";
        return $this;
    }
    
    public function execute() {
        $sql = $this->primaryPart.$this->wherePart.$this->orderByPart;
        $result = $this->connection->prepare($sql);
        
        $execResult = $result->execute($this->statementParams);
        $fetchResult = $result->fetchAll(PDO::FETCH_ASSOC);

        if (strpos($this->primaryPart, "SELECT") !== false) {
            return $fetchResult;
        }
        return $execResult;
    }
}