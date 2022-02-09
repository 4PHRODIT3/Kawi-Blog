<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo_obj)
    {
        $this->pdo = $pdo_obj;
    }

    public function create($table, $data)
    {
        $keys = implode(',', array_keys($data));
        $dummy_data = "";
        foreach ($data as $k => $val) {
            $dummy_data .= "?,";
        }
        $dummy_data = trim($dummy_data, ',');
        $query = "INSERT INTO $table ($keys) VALUES ($dummy_data);";
        $statement = $this->pdo->prepare($query);
        $statement->execute(array_values($data));
    }

    public function retrieve($table, $filter_data = [], $condition="")
    {
        $filter_query = "";
        if (!empty($filter_data)) {
            $key= array_keys($filter_data)[0];
            $filter_query = "WHERE $key=?";
        }
        $query = "SELECT * FROM $table $filter_query".$condition;
        $statement = $this->pdo->prepare($query);
        $statement->execute(array_values($filter_data));
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function update($table, $data, $filter_data)
    {
        $values = "";
        foreach ($data as $key=>$val) {
            $values .= $key."=?,";
        }
        $values = trim($values, ',');
        $filter_query = array_keys($filter_data)[0]."=?";
        $array_values = array_values($data);
        $array_values[] = array_values($filter_data)[0];

        $query = "UPDATE $table SET $values WHERE $filter_query";
        $statement = $this->pdo->prepare($query);
        $statement->execute($array_values);
        return $statement->rowCount();
    }

    public function delete($table, $filter_data)
    {
        $filter_query = array_keys($filter_data)[0]."=?";
        $query = "DELETE FROM $table WHERE $filter_query";
        $statement = $this->pdo->prepare($query);
        
        $statement->execute([array_values($filter_data)[0]]);
        return $statement->rowCount();
    }

    public function lastID($table)
    {
        $query = "SELECT MAX(id) as last_id FROM $table;";
        $statment = $this->pdo->prepare($query);
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_ASSOC)[0]['last_id'];
    }

    public function customQuery($query, $filter_data=[])
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
