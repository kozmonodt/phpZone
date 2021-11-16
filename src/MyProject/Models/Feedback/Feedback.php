<?php

namespace MyProject\Models\Feedback;

class Feedback
{
    private $surname;
    private $forename;
    private $middleName;

    public function saveToFile()
    {
        $objData = serialize($this);
        echo getcwd();
        $filePath = getcwd().DIRECTORY_SEPARATOR."messages.txt";
        if (is_writable($filePath)) {
            $fp = fopen($filePath, "w");//Заменить на аппенд потом
            fwrite($fp, $objData);
            fclose($fp);
        }
    }

    public static function getAll()
    {
        $filePath = getcwd().DIRECTORY_SEPARATOR."messages.txt";
        if (file_exists($filePath)){
            $objData = file_get_contents($filePath);
            $obj = unserialize($objData);
//            if (!empty($obj)){
//                $name = $obj->name;
//                $birthdate = $obj->birthdate;
//                $position = $obj->position;
//            }
            return $obj;
        }
    }

}