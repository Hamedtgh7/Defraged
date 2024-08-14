<?php

use thecodeholic\phpmvc\Application;

class m0003_add_todo
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE todo(
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description VARCHAR(255),
        is_done BOOLEAN NOT NULL) 
        ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE todo;";
        $db->pdo->exec($SQL);
    }
}
