<?php

namespace MyProject\Models\Test;
use MyProject\Exceptions\NotFoundExeption;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Articles\Article;


class Test extends ActiveRecordEntity
{

    protected $fio;
    protected $answers;
    protected $results;
    protected $createdAt;

    /**
     * @param mixed $fio
     */
    public function setFio($fio): void
    {
        $this->fio = $fio;
    }

    /**
     * @param mixed $answers
     */
    public function setAnswers($answers): void
    {
        $this->answers = serialize($answers);
    }

    /**
     * @param mixed $results
     */
    public function setResults($results): void
    {
        $this->results = serialize($results);
    }

    /**
     * @return mixed
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * @return mixed
     */
    public function getAnswers()
    {
        return print_r(unserialize($this->answers));
    }

    /**
     * @return mixed
     */
    public function getResults()
    {
        return print_r(unserialize($this->results));
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }




    protected static function getTableName() : string
    {
        return 'test';
    }

    public static function createFromArray(array $fields, array $results) : Test
    {

        $test = new Test();

        $test->setFio($fields['fio']);
        unset($fields['fio']);
        $test->setResults($results);
        $test->setAnswers($fields);


        var_dump($test);
        $test->save();

        return $test;
    }



}