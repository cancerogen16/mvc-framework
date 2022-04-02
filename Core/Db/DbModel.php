<?php

namespace App\core\Db;

use App\core\Application;
use App\core\Model;
use PDOStatement;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

    /**
     * @return bool
     */
    public function save(): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $params = array_map(fn($attr) => ":$attr", $attributes);

        $statement = self::prepare("
            INSERT INTO $tableName (" . implode(',', $attributes) . ") 
            VALUES (" . implode(',', $params) . ")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();

        return true;
    }

    /**
     * @param $sql
     * @return false|PDOStatement
     */
    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }

    /**
     * @param $where
     * @return false|mixed|object
     */
    public function findOne($where)
    {
        $tableName = static::tableName();

        $attributes = array_keys($where);

        $sql = implode("AND ", array_map(fn($attr) => "$attr=:$attr", $attributes));

        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();

        return $statement->fetchObject(static::class);
    }
}