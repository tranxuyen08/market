<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
    
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // public function selectAll($table)
    // {
    //     $statement = $this->pdo->prepare("select * from {$table}");

    //     $statement->execute();

    //     return $statement->fetchAll(PDO::FETCH_CLASS);
    // }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (\Exception $e) {
            //
        }
    }

    public function sqlQuery($sql, array $params = array())
    {
        try {
            if ($params) {
                $query = $this->bind($sql, $params);
                $query->execute();
            } else {
                $query = $this->pdo->query($sql);
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            $this->error_message = $e->getMessage();
            echo 'Database Exception';
            return false;
        }

        return $query;
    }

    public function bind($sql, $params)
    {
        $query = $this->pdo->prepare($sql);
        foreach ($params as $key => $v) {
            if (is_null($v)) {
                list($value, $type) = array(0 => null, 1 => PDO::PARAM_NULL);
            } else {
                list($value, $type) = (array)$v + array(1 => PDO::PARAM_STR);
            }
            $query->bindValue(is_int($key) ? ++$key : $key, $value, $type);
        }

        return $query;
    }

    public function begin_transaction()
    {
        return $this->pdo->beginTransaction();
    }

    public function commit_transaction()
    {
        return $this->pdo->commit();
    }

    public function rollback_transaction()
    {
        return $this->pdo->rollBack();
    }
}
