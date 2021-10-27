<?php

namespace MyProject\Models;

use MyProject\Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;


    public function getId() : int
    {
        return $this->id;
    }

    public static function findAll() : array
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;',[],static::class);
    }
    public function __set(string $name, $value): void
    {
        $camelCaseName = $this->snakeToCamel($name);
        $this ->$camelCaseName = $value;
    }

    private function camelCaseToSnake(string $source) : string
    {
        return preg_replace('/(?<!^)[A-Z]/', '_$0', $source);
    }

    private function snakeToCamel(string $snakeName) :string
    {
        return lcfirst(str_replace('_', '', ucwords($snakeName, '_')));
    }

    public static function getById(int $id) : ? self
    {
        $db = Db::getInstance();
        $result = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id',
            [':id' => $id],
            static::class
        );
        return $result ? $result[0] : null;

    }

    private function mapPropertiesToDbFormat() : array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName= $property->getName();
            $snakePropertyName = $this->camelCaseToSnake($propertyName);
            $mappedProperties[$snakePropertyName] = $this->$propertyName;
        }
        return $mappedProperties;
    }

    public function save() : void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if($this->id === null){
            $this->insert($mappedProperties);
        } else {
            $this->update($mappedProperties);
        }
    }

    private function insert($mappedProperties)
    {
        $filteredProperties = array_filter($mappedProperties);
        var_dump($filteredProperties);
        $columns = [];
        $paramsNames = [];
        $params2values = [];
        foreach ($filteredProperties as $index => $item) {
            $columns[] = '`' . $index . '`';
            $paramName = ':' . $index;
            $paramsNames[] = $paramName;
            $params2values[$paramName] = $item;
        }

        $columnsViaSemicolon = implode(', ', $columns);
        $paramsNamesViaSemicolon = implode(', ', $paramsNames);

        $sql = 'INSERT INTO ' . static::getTableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramsNamesViaSemicolon . ');';

        var_dump($sql);

        $db = Db::getInstance();
        $db->query($sql,$params2values,static::class);
        $this->id = $db->getLastInsertId();
    }

    private function update($mappedProperties)
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column  => $value) {
            $param = ':param' . $index;
            $columns2params[] = $column . ' = ' . $param;
            $params2values[$param] = $value;
            $index++;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;

        $db = Db::getInstance();
        $db->query($sql,$params2values,static::class);

    }

    public function delete() : void
    {
        $db = Db::getInstance();
        $db->query(
            'DELETE FROM `' . static::getTableName() . '` WHERE id = :id',
            [':id' => $this->id]
        );
        $this->id = null;
    }

    public static function findOneByColumn(string $columnName, $value) : ? self
    {
        $db = Db::getInstance();
        $result = $db->query('SELECT * FROM `' . static::getTableName() . '` WHERE `' . $columnName . '` = :value LIMIT 1;',
        [':value'=>$value], static::class
        );

        if($result === []) {
            return null;
        }

        return $result[0];
    }
    abstract protected static function getTableName() : string;


}