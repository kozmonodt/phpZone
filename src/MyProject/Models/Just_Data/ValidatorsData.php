<?php

namespace MyProject\Models\Just_Data;

class ValidatorsData
{
    private static $rulesForContact = [
        'fio' => ['isNotEmpty','isFIO'],
        'email' => ['isNotEmpty', 'isEmail'],
        'telefon' => ['isNotEmpty', 'isTelNumber'],
    ];

    private static $rulesForTestClient = [
        'group' => array('isSet'),
        'fio' => array('isNotEmpty', 'isFIO'),
    ];

    private static $rightAnswersForTest = [
        'two_plus_two' => '2',
        'chislo' => 'chet',
        'plane_text' => 'Пиво'
    ];

    private static $results = [];

/**/

    public static function getRulesForContact(): array
    {
        return self::$rulesForContact;
    }

    public static function getRulesForTestClient(): array
    {
        return self::$rulesForTestClient;
    }

    public static function getRightAnswersForTest(): array
    {
        return self::$rightAnswersForTest;
    }

    public static function getResults(): array
    {
        return self::$results;
    }

/**/

    public static function setResults(array $results): void
    {
        self::$results = $results;
    }





}