<?php

namespace query;

class MySqlDatabaseConnection implements DatabaseConnectionInterface
{
    protected static $instance = null;
    protected ?\PDO $connection = null;
    protected $host;
    protected $dbname;
    protected $user;
    protected $password;

    private function __construct($host, $dbname, $user, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
        $this->connect();
    }

    public static function getInstance($host, $dbname, $user, $password)
    {
        if (static::$instance === null) {
            static::$instance = new static($host, $dbname, $user, $password);
        }

        return static::$instance;
    }

    protected function connect()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        try {
            $this->connection = new \PDO($dsn, $this->user, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
