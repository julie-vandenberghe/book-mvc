<?php

namespace M2i\Mvc\Model;

use M2i\Mvc\Database;

class Model
{
    public static function getTable()
    {
        $class = static::class; // Nom de la classe: Mvc\Model\User
        $class = strrchr($class, '\\'); // \User

        return strtolower(substr($class, 1)).'s'; // users
    }

    public static function all()
    {
        $table = static::getTable(); // static:: est $this en static
        $sql = 'SELECT * FROM '.$table;
        $query = Database::get()->query($sql);

        return $query->fetchAll();
    }

    public static function find($id)
    {
        $table = static::getTable(); // static:: est $this en static
        $sql = "SELECT * FROM $table WHERE id = :id";
        $query = Database::get()->prepare($sql);
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function save($fields)
    {
        $table = static::getTable();

        $columns = implode(', ', $fields); // ['name', 'age'] => name, age
        $values = [];

        foreach ($fields as $field) {
            $values[':'.$field] = $this->$field;
        }

        // [':name' => 'Fiorella', ':age' => 3]
        $parameters = implode(', ', array_keys($values)); // [':name', ':age']

        $sql = "INSERT INTO $table ($columns) VALUES ($parameters)";
        $query = Database::get()->prepare($sql);

        return $query->execute($values);
    }
}
