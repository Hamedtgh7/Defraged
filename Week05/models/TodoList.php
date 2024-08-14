<?php

namespace app\models;

use thecodeholic\phpmvc\Application;
use thecodeholic\phpmvc\db\DbModel;

class TodoList extends DbModel
{
    public string $title = '';
    public string $description = '';
    public bool $is_done = false;

    public static function tableName(): string
    {
        return 'todo';
    }


    public function attributes(): array
    {
        return ['title', 'description', 'is_done'];
    }

    public function labels(): array
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'is_done' => 'Done'
        ];
    }

    public function rules()
    {
        return [
            'title' => [self::RULE_REQUIRED],
            'is_done' => [self::RULE_REQUIRED]
        ];
    }

    public function task_list()
    {
        $statement = Application::$app->db->prepare("SELECT * FROM todo");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateDone($id, $is_done)
    {
        $statement = Application::$app->db->prepare("UPDATE todo SET is_done = ? Where id = ?");
        return $statement->execute([$is_done, $id]);
    }

    public function create($title, $description)
    {
        $statement = Application::$app->db->prepare("INSERT INTO todo (title,description,is_done) VALUES (?,?,0)");
        return $statement->execute($title, $description);
    }

    public function deleteTask($id)
    {
        $statement = Application::$app->db->prepare("DELETE FROM todo WHERE id = ?");
        return $statement->execute([$id]);
    }

    public function get_task($id)
    {
        $statement = Application::$app->db->prepare("SELECT * FROM todo WHERE id=?");
        $statement->execute([$id]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}
