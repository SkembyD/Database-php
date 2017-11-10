<?php
/**
* Vérifie la validité du formulaire Register
* @return array | bool
*/
function validateRegister(){
  $errors = [];
  $error = validateRequired($_POST['firstname']);
  if($error){
    $errors['firstname'] = validateRequired($_POST['firstname']);
  }
  $error = validateRequired($_POST['lastname']);
  if($error){
    $errors['lastname'] = validateRequired($_POST['lastname']);
  }
  $error = validateEmail($_POST['email']);
  if($error){
    $errors['email'] = validateEmail($_POST['email']);
  }
  $error = validatePassword($_POST['password']);
  if($error){
    $errors['password'] = validatePassword($_POST['password']);
  }
$error = validateIndentical($_POST['repassword']);
  if($error){
    $errors['repassword'] = $errors;
  }
  return $errors;
}

function validateRequired($str){
  if(empty($str)){
    return "Element obligatoire"
  }
}

// Vérifie la validité d'un password
 //@var $password Password à valider
//@return array | void
function validatePassword($password){
  $errors = array();

  if(strlen($password) < 5) {
    $errors['password']['invalidLenght'] = "Mot de passe inférieur à 5 caractère...";
  }

  if(!preg_match('/[[:digit:]]/', $password)) {
    $errors['password']['invalidDigit'] = "Mot de passe ne contenant pas de numérique...";
  }

  if(!preg_match('/[a-zA-Z]/', $password)) {
    $errors['password']['invalidAlpha'] = "Mot de passe ne contenant pas de lettre alphabet...";
  }

  if(strtolower($password) == $password) {
    $errors['password']['invalidUpper'] = "Mot de passe ne contenant pas de Majuscule";
  }

  $specialAllow = ["&", "@", "#", "[", "]", "*", "%"];
  if(str_replace($specialAllow, "_", $password) == $password) {
    $errors['password']['invalidSpecial'] = "Mot de passe ne contenant pas un caractère spécial comme " . join($specialAllow);
  }
if(!empty($errors){
  return $errors
})
}

//Vérifie la validité d'un email
//@var $email Email à valider
//@return array | bool
///
function validateEmail($email){
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    return "Email invalide";
  }
};


//Vérifie l'identicité de 2 paramètres
//@var $str1 string à comparer
//@var $str1 string à comparer
//@return string | void
function validateIndentical($str1, $str2){
  if(str1 !== $str2){
    return "Non identique...";
  }
}
