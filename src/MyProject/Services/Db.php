<?php

namespace MyProject\Services;
use MyProject\Exceptions\DbException;

class Db
{

    private $pdo;

    private static $instance;

    private static $instancesCount = 0;

    private function __construct()
    {
        try {
            self::$instancesCount++;
            $dbOptions = (require __DIR__ . '/../../settings.php')['db'];
            $this->pdo = new \PDO(
                'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->pdo->exec('SET NAMES UTF8');
        }
        catch (\PDOException $e){
            throw new DbException('Ошибка подключения к БД: ' . $e->getMessage());
        }
    }



    public function query(string $sql, $params = [], string $className = 'stdClass') : ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if ($result === false){
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    public function countQuery(string $sql) : ? string
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute();
        if ($result === false){
            return null;
        }
        return $sth->fetchColumn();
    }

    public static function getInstancesCount() : int
    {
        return self::$instancesCount;
    }

    public static function getInstance() : self
    {
        if(self::$instancesCount === 0){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getLastInsertId(): int
    {
        return (int) $this->pdo->lastInsertId();
    }

}