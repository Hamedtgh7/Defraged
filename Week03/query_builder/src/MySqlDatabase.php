<?php

namespace query;

class MySqlDatabase implements DatabaseInterface
{
    protected $connection;
    protected $table;
    protected $query;
    protected $bindings = [];

    public function __construct(DatabaseConnectionInterface $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function table(string $table): DatabaseInterface
    {
        $this->bindings = [];
        $this->table = $table;
        return $this;
    }

    public function select(array $cols = ['*']): DatabaseInterface
    {
        $columns = implode(', ', $cols);
        $this->query = "SELECT $columns FROM $this->table";
        return $this;
    }

    public function insert(array $fields): DatabaseInterface
    {
        $columns = implode(', ', array_keys($fields));
        $values = ':' . implode(', :', array_keys($fields));
        $this->query = "INSERT INTO $this->table ($columns) VALUES ($values)";
        $this->bindings = $fields;
        return $this;
    }

    public function update(array $fields): DatabaseInterface
    {
        $set = '';
        foreach ($fields as $column => $value) {
            $set .= "$column = :$column, ";
            $this->bindings[$column] = $value;
        }
        $set = rtrim($set, ', ');
        $this->query = "UPDATE $this->table SET $set";
        return $this;
    }

    public function delete(): DatabaseInterface
    {
        $this->query = "DELETE FROM $this->table";
        return $this;
    }

    public function where(string $val1,  $val2, string $operation = '='): DatabaseInterface
    {
        $this->query .= " WHERE $val1 $operation :where_$val1";
        $this->bindings["where_$val1"] = $val2;
        return $this;
    }

    public function order_by(string $col, bool $order): DatabaseInterface
    {
        $in_order = 'ASC';
        if ($order == false) {
            $in_order = 'DESC';
        }
        $this->query .= " ORDER BY $col $in_order";
        return $this;
    }

    public function limit(int $number): DatabaseInterface
    {
        $this->query .= " LIMIT $number";
        return $this;
    }

    public function join(string $table, string $left, string $right): DatabaseInterface
    {
        $this->query .= " LEFT JOIN $table ON $left = $right";
        return $this;
    }

    public function group_by(string $col): DatabaseInterface
    {
        $this->query .= " GROUP BY $col";
        return $this;
    }

    public function having($condition, $value): DatabaseInterface
    {
        $this->query .= " HAVING $condition :have_value";
        $this->bindings['have_value'] = $value;
        return $this;
    }

    public function count(string $col): DatabaseInterface
    {
        $this->query .= " COUNT($col)";
        return $this;
    }

    public function fetch()
    {
        $stmt = $this->connection->prepare($this->query);
        $stmt->execute($this->bindings);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchAll()
    {
        $stmt = $this->connection->prepare($this->query);
        $stmt->execute($this->bindings);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function exec(): bool
    {
        $stmt = $this->connection->prepare($this->query);
        return $stmt->execute($this->bindings);
    }
}
