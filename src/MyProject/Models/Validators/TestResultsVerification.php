<?php

namespace MyProject\Models\Validators;

use MyProject\Models\Just_Data\ValidatorsData;

class TestResultsVerification extends CustomFormValidator
{
    public function checkResults($post_array){
        foreach(ValidatorsData::getRightAnswersForTest() as $question => $answer){
            if($answer == $post_array[$question]){
//                $this->results[$question] = 'true';
                $results = ValidatorsData::getResults();
                $results[$question] = 'true';
                ValidatorsData::setResults($results);
            } else {
                $results = ValidatorsData::getResults();
                $results[$question] = 'false';
                ValidatorsData::setResults($results);
            }
        }
        print_r(ValidatorsData::getResults());
    }
}