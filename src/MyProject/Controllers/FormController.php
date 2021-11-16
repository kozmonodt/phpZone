<?php

namespace MyProject\Controllers;

use MyProject\Models\Just_Data\ValidatorsData;
use MyProject\Models\Validators\FormValidator;
use MyProject\Models\Validators\CustomFormValidator;
use MyProject\Models\Validators\TestResultsVerification;

class FormController extends AbstractController
{
    public function validateContactForm()
    {
        $validator =new FormValidator( ['fio', 'email', 'telefon'] );
        $rules= ValidatorsData::getRulesForContact();
        foreach($rules as $rule_key => $rules){
            foreach($rules as $rule){
                $validator->setRule($rule_key,$rule);
            }
        }

        $validator->validate($_POST);

        $validator->showErrors();
    }

    public function validateTestClient()
    {
        $validator =new CustomFormValidator( ['group', 'fio'] );
        $rules= ValidatorsData::getRulesForTestClient();
        foreach($rules as $rule_key => $rules){
            foreach($rules as $rule){
                $validator->setRule($rule_key,$rule);
            }
        }

        $validator->validate($_POST);

        $validator->showErrors();
    }

    public function testResultsVerification()
    {
        $validator =new TestResultsVerification([]);


        $validator->checkResults($_POST);

//        $validator->showErrors();
    }
}