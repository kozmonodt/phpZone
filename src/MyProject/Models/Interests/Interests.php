<?php

namespace MyProject\Models\Interests;

use MyProject\Models\ActiveRecordEntity;

class Interests extends ActiveRecordEntity
{
    protected $interest;
    protected $text;


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