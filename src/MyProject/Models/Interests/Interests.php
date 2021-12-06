<?php

namespace MyProject\Models\Interests;

use MyProject\Models\ActiveRecordEntity;

class Interests extends ActiveRecordEntity
{
    public $interest;
    public $text;

    /**
     * @param $interest
     * @param $text
     */
    public function __construct($interest, $text)
    {
        $this->interest = $interest;
        $this->text = $text;
    }


    protected static function getTableName() : string
    {
        return 'interests';
    }

    /**
     * @return mixed
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

}