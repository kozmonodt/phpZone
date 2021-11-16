<?php

namespace MyProject\Models\Validators;

class FormValidator
{
    public static $Current_field;
    public $Rules = [];
    public $form_fields_names;
    public $Errors = [];
    function __construct($form_field_names){
        $this->form_fields_names = $form_field_names;
    }

    public function isNotEmpty($data, $form_field){
        if(!empty($data)){
            return true;
        } else
        {
//            array_push($this->Errors,"There is an empty data in " . Form_Validator::$Current_field);
            array_push($this->Errors,"There is an empty data in " . $form_field);
            return false;
        }
    }

    public function isInteger($data){
        if(is_int($data)){
            return true;
        } else {
            array_push($this->Errors,"There is a non integer data here!");
            return false;
        }
    }

    public function isLess($data, $value){
        if(is_int($data)){
            if($data < $value){
                return true;
            } else {
                return false;
            }
        } else {
            array_push($this->Errors,"There is a non integer data here!");
            return false;
        }
    }

    public function isGreater($data, $value){
        if(is_int($data)){
            if($data > $value){
                return true;
            } else {
                return false;
            }
        } else {
            array_push($this->Errors,"There is a non integer data here!");
            return false;
        }
    }

    public function isEmail($data){
        if(filter_var($data, FILTER_VALIDATE_EMAIL)){
            echo 'Is email' . '<br>';
            return true;
        } else {
            array_push($this->Errors,"There is a non email field here!");
            return false;
        }
    }

    public function setRule($field_name, $validator_name){
        //array_push($this->Rules, $field_name, $validator_name);
        $this->Rules[$field_name][] = $validator_name;
        //array_push($this->Rules[$field_name] , $validator_name);
    }

    public function validate($post_array){
        echo 'validatio!!';
        echo '<pre>';
        var_dump($post_array);
        echo '</pre>';
        foreach($this->form_fields_names as $form_field) {
            if(array_key_exists($form_field, $post_array)){
                if(array_key_exists($form_field, $this->Rules)){
                    echo "exists in check list" . PHP_EOL;
                    //$callback = $this->Rules['fio'];
                    $field_data = $post_array[$form_field];

                    echo '<pre>';
                    var_dump($this->Rules);
                    var_dump($this->Rules[$form_field]);
                    var_dump($field_data);
                    echo '</pre>';

                    //echo $this->Rules[$form_field];
                    foreach($this->Rules[$form_field] as $callback){
                        //echo $callback.' '.$field_data;
                        //$this->$callback($field_data);
                        call_user_func_array(array($this, $callback), array($field_data , $form_field , $post_array));
                    }
                }
            } else {
                array_push($this->Errors,"There is no such a field in the form");
                echo 'no_field_error';
            }
        }
    }

    public function showErrors(){
        if(isset($this->Errors) && count($this->Errors) != 0){
            foreach($this->Errors as $error){
                echo $error . '<br>';
            }
        } else {
            echo "All is fine" . "<br>";
        }
    }

    public function isFIO($data_to_check){
        if(preg_match("/^[a-zA-Z]+(?: [a-zA-Z]+){2,}$/" , $data_to_check)){
            echo "It's a FIO" . "<br>";
            return true;
        } else {
            array_push($this->Errors,"There is a non-FIO data in FIO field!");
            return false;
            //echo '<h4 class="error">Name is not valid! It must not contain numbers   or special characters </h4>.</a>';
        }
    }

    public function isTelNumber($data_to_check){
        if(preg_match("/^\+7+[0-9]{10}$/",  $data_to_check)){
            echo "It's a TEL" . "<br>";
            return true;
        } else {
            array_push($this->Errors, "There is non-Telephone data in TEL field!");
            return false;
        }
    }
    /*
    public function isSet($data_to_check, $field_to_check){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST[$field_to_check])){
                return true;
            } else {
                array_push($this->Errors, "There is an unset $field_to_check field in form");
                return false;
            }
        }
    }
    */
}