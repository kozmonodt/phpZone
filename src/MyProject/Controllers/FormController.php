<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidDataException;
use MyProject\Exceptions\NotFoundExeption;
use MyProject\Models\Articles\Article;
use MyProject\Models\Just_Data\ValidatorsData;
use MyProject\Models\Validators\FormValidator;
use MyProject\Models\Validators\CustomFormValidator;
use MyProject\Models\Validators\TestResultsVerification;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Test\Test;

class FormController extends AbstractController
{
    public function validateContactForm()
    {


        if(!empty($_POST)){
            try{
                $validator =new FormValidator( ['fio', 'email', 'telefon'],
                    [
                    'fio' => ['isNotEmpty','isFIO'],
                    'email' => ['isNotEmpty', 'isEmail'],
                    'telefon' => ['isNotEmpty', 'isTelNumber'],
                    ]);
//                $rules= ValidatorsData::getRulesForContact();
//                foreach($rules as $rule_key => $rules){
//                    foreach($rules as $rule){
//                        $validator->setRule($rule_key,$rule);
//                    }
//                }
                $validator->validate($_POST);
            }
            catch (InvalidDataException $e){
                $this->view->renderHTML('main/contact.php', ['error'=>$e->getMessage()]);
                return;
            }
//            header('Location: /articles/' . $article->getId(),true,302);
//            exit;

        }
        $this->view->renderHTML('main/contact.php');
    }

    public function validateTestClient()
    {

        if(!empty($_POST)){
            try{
                $validator =new CustomFormValidator( ['group', 'fio'],
                    [
                        'group' => ['isSet'],
                        'fio' => ['isNotEmpty', 'isFIO'],
                    ]
                );
                $validator->validate($_POST);
            }
            catch (InvalidDataException $e){
                $this->view->renderHTML('main/test.php', ['error'=>$e->getMessage()]);
                return;
            }
//            header('Location: /articles/' . $article->getId(),true,302);
//            exit;

        }
        $this->view->renderHTML('main/test.php');
    }

    public function testResultsVerification()
    {

//        if(!isset($_POST['fio'])){
        if($_POST['fio'] == ''){
            throw new UnauthorizedException();
        }


        //$validator->checkResults($_POST);




        if(!empty($_POST)){

            $validator =new TestResultsVerification([]);
            $results = $validator->checkResults($_POST);
            $test = Test::createFromArray($_POST, $results);

            header('Location: /test/' . $test->getId(),true,302);
            exit;
        }
        $this->view->renderHTML('main/test.php');
    }

    public function viewTest($testId)
    {
        $test = Test::getById($testId);

        if($test === null)
        {
            throw new NotFoundExeption();
        }

        $this->view->renderHTML(
            'main/testResult.php',[
                'test' => $test,
            ]
        );
    }
}