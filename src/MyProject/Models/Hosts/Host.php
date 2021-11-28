<?php

namespace MyProject\Models\Hosts;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Services\Db;

class Host extends ActiveRecordEntity
{
    protected $time_statistic;
    protected $web_page;
    protected $ip_address;
    protected $host_name;
    protected $browser_name;

    /**
     * @return mixed
     */
    public function getTimeStatistic()
    {
        return $this->time_statistic;
    }

    /**
     * @return mixed
     */
    public function getWebPage()
    {
        return $this->web_page;
    }

    /**
     * @return mixed
     */
    public function getHostName()
    {
        return $this->host_name;
    }




    protected static function getTableName(): string
    {
        return 'hosts';
    }

    public static function saveStatistic(){
        $host = new Host();
        //$host->time_statistic = date('Y-m-d h:m:s');
//        $host->web_page = substr($_SERVER['REQUEST_URI'], 1);


        $host->web_page = $_SERVER['REQUEST_URI'] ?? '/';

        $host->ip_address = $_SERVER['REMOTE_ADDR'];
        $host->host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $host->browser_name = $_SERVER['HTTP_USER_AGENT'];
/*        echo '<pre>';
        var_dump($host);
        echo '</pre>';*/
        $host->save();
    }

    public static function findAll() : array
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '` ORDER BY time_statistic DESC;',[],static::class);
    }
    public static function limitedQuery($start, $per_page)
    {
        $db = Db::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '` ORDER BY time_statistic DESC LIMIT ' .
            $start . ',' . $per_page . ';',
            [],
            static::class);
    }

    public static function countEntries()
    {
        $db = Db::getInstance();
        return $db->countQuery('SELECT count(*) FROM `' . static::getTableName() . '` ;');
    }
}