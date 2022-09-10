<?php

namespace App\Models;

use App\Classes\Database;
use Bootstrap\Application;

abstract class BaseModel
{
    public array $errors = [];
    public Database $database;

    public function __construct(){
        $this->database = Application::$app->database;
        $this->loadData(Application::$app->request->getBody());
    }

    abstract public static function tableName();
    abstract public function attributes(): array;
    abstract public static function primaryKey(): string;

    public function loadData($data){

        echo "<pre>";
        echo var_dump($data);
        echo "<pre>";
//        foreach ($data as $key => $value){
//            if(property_exists($this, $key)){
//                $this->{$key} = $value;
//            }
//        }
    }

    public function save()
    {
        $tableName = static::tableName();
        $attributes = static::attributes();

        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = $this->database->prepare("INSERT INTO $tableName (". implode(',', $attributes) .") VALUES(". implode(",", $params) .")");

        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        return $statement->execute();
    }

    public function findAll()
    {
        $statement = $this->database->prepare("SELECT * FROM {$this->tableName()}");
        $statement->execute();

        return $statement->fetchAll();
    }

    public function findWhere($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode(array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = $this->database->prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();

        return $statement->fetchAll();
    }

    public function addError($attibute, $message){
        $this->errors[$attibute] = $message;
    }

    public function hasError($attibute){
        return $this->errors[$attibute] ?? false;
    }

    public function getError($attribute)
    {
        return $this->errors[$attribute] ?? '';
    }
}