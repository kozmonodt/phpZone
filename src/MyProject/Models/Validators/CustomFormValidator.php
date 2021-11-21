<?php

namespace MyProject\Models\Validators;

class CustomFormValidator extends FormValidator
{

    function __construct($form_field_names, $rules){
        parent::__construct($form_field_names, $rules);

    }

    public function isSet($data_to_check, $field_to_check, $post_array){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($post_array[$field_to_check])){
               // echo $field_to_check . ' Is set' . '<br>';
                return true;
            } else {
                $this->Errors[$field_to_check] = "Unset field";
                return false;
            }
        }
    }
}