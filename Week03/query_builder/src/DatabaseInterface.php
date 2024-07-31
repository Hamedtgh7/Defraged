<?php

namespace query;

interface DatabaseInterface
{
    public function __construct(DatabaseConnectionInterface $connection);
    public function table(string $table): DatabaseInterface;
    public function select(array $cols = ['*']): DatabaseInterface;
    public function insert(array $fields): DatabaseInterface;
    public function update(array $fields): DatabaseInterface;
    public function delete(): DatabaseInterface;
    public function where(string $val1,  $val2, string $operation = '='): DatabaseInterface;
    public function order_by(string $col, bool $order): DatabaseInterface;
    public function limit(int $number): DatabaseInterface;
    public function join(string $table, string $left, string $right): DatabaseInterface;
    public function group_by(string $col): DatabaseInterface;
    public function having($condtion, $value): DatabaseInterface;
    public function fetch();
    public function fetchAll();
    public function exec(): bool;
}
