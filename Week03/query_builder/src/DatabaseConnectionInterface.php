<?php

namespace query;

interface DatabaseConnectionInterface
{
    public static function getInstance($host, $dbname, $user, $password);
    public function getConnection();
}
