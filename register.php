<?php
require_once 'form_register.php';

$array =[];
$error = validEmpty($_POST);
  if($error){
  $errors['isEmpty'] = $error;
}

function validEmpty($var){
  if(empty($var)){
    return '$var vide';
  }
}

var_dump($errors);
