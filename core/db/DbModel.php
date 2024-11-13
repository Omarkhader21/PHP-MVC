<?php

namespace omarkhader21/phpcoremvc\db;

use omarkhader21/phpcoremvc\Model;
use omarkhader21/phpcoremvc\Application;

abstract class DbModel extends Model
{
    abstract static public function tableName(): string;
    abstract public function attributes(): array;
    abstract public static function primaryKey(): string;
    public function save()
    {
        $tableName = $this->tableName();

        $attributes = $this->attributes();

        $params = array_map(fn($attr) => ":$attr", $attributes);

        $statement = $this->prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUES(" . implode(",", $params) . ")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();

        return true;
    }
    public static function prepare($sql)
    {
        return Application::$app->database->pdo->prepare($sql);
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);

        // SELECT * FROM $tableName WHERE email = :email
        $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));

        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        
        foreach($where as $key => $item)
        {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchObject(static::class);
    }
}
