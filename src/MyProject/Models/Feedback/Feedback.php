<?php

namespace MyProject\Models\Feedback;

use MyProject\Exceptions\InvalidDataException;


class Feedback
{
    private $surname;
    private $name;
    private $middleName;
    private $email;
    private $text;

    /**
     * SETTERS
     */

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $middleName
     */
    public function setMiddleName($middleName): void
    {
        $this->middleName = $middleName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * GETTERS
     */


    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }


    /**
     * METHODS
     */


    public function saveToFile()
    {
        $objData = serialize($this);
        $objDataWithDelimeter = $objData . "<!-- E -->";
        echo getcwd();
        $filePath = getcwd().DIRECTORY_SEPARATOR."messages.txt";
        echo $filePath;
        if (is_writable($filePath)) {
            echo 'writing';
            $fp = fopen($filePath, "a");//Заменить на аппенд потом
            fwrite($fp, $objDataWithDelimeter);
            fclose($fp);
        }
    }

    public static function getAll()
    {
        $filePath = getcwd().DIRECTORY_SEPARATOR."messages.txt";
        if (file_exists($filePath)){
            $wholeData = file_get_contents($filePath);
            $unsObjArray = explode("<!-- E -->", $wholeData);
            unset($unsObjArray[count($unsObjArray)-1]);
            $serObjArray = [];
            foreach ($unsObjArray as $unsObj){
                $serObjArray[] = unserialize($unsObj);
            }


            return $serObjArray;
        }
        return  null;
    }

    public static function createFromArray(array $fields) : self
    {
        if(empty($fields['name']))
        {
            throw new InvalidDataException('Не передано имя');
        }

        if(empty($fields['surname']))
        {
            throw new InvalidDataException('Не передана фамилия');
        }

        if(empty($fields['middlename']))
        {
            throw new InvalidDataException('Не передано отчество');
        }

        if(empty($fields['email']))
        {
            throw new InvalidDataException('Не передан email');
        }

        if(empty($fields['text'])){
            throw new InvalidDataException('Не передан текст статьи');
        }

        $feedBack = new Feedback();


        $feedBack->setName($fields['name']);
        $feedBack->setMiddleName($fields['middlename']);
        $feedBack->setSurname($fields['surname']);
        $feedBack->setEmail($fields['email']);
        $feedBack->setText($fields['text']);

        $feedBack->saveToFile();

        return $feedBack;
    }

}