<?php
require_once 'validate_register.php';
require_once 'db.php';
if(isset($_POST['submit'])) {
  $errors = validateRegister();
  if(count($error) == 0){
    // INSERT INTO en bbd
    $data['firstname'] = strtolower($_POST['firstname']);
    $data['lastname'] = strtolower($_POST['lastname']);
    $data['pass'] = crypThis($_POST['password']);
    $data['email'] = strtolower($_POST['email']);

    $result = insertUser($data);
    if($result != false){
      header("refresh:5;url=index.php");
      echo "Bienvenue, la redirection automatique ce déclenchera dans 5 sec"
    }
  }
}
?>
<form action="" method="POST">
  <label for="firstname">Prenom</label>
  <input id="firstname" type="text" name="firstname" value='<?= (isset($_POST["firstname"]))? $_POST["firstname"]: ""?>' name="firstname">
  <br>
  <?php
  if(isset($errors['firstname'])){
    echo $errors['firstname'] . "<br>";
  }
  ?>
  <label for="lastname">Nom</label>
  <input id="lastname" type="text" name="lastname">
  <br>
  <?php
  if(isset($errors['lastname'])){
    echo $errors['lastname'] . "<br>";
  }
  ?>
  <label for="email">Email</label>
  <input id="email" type="text" value='<?= (isset($_POST["email"]))? $_POST["email"]: ""?>' name="email">
  <br>
  <?php //if(isset($errors['email'])){ echo $errors['email']; }?>
  <?= (isset($errors['email']))? $errors['email'] . "<br>": "" ?>
  <label for="password">Password</label>
  <input id="password" type="password" name="password">
  <br>
  <?php
  if(isset($errors['password'])){
    echo "<ul>";
  }
  foreach ($errors['password'] as $key => $value) {
    echo "<li class='$key' >$value</li>";
  }
  echo "</ul>"
}
?>
<label for="repassword">Re-Password</label>
<input id="repassword" type="password" name="repassword">
<br>
<?php
if(isset($errors['repassword'])){
  echo $errors['repassword'] . "<br>";
}
?>

<label for="label">label</label>
<input id="label" type="text" name="label">
<br>
<?php
if(isset($errors['label'])){
  echo $errors['label'] . "<br>";
}
?>

<label for="level">level</label>
<input id="level" type="number" name="level">
<br>
<?php
if(isset($errors['level'])){
  echo $errors['level'] . "<br>";
}
?>

<label for="avatar">avatar</label>
<input id="avatar" type="text" name="avatar">
<br>
<?php
if(isset($errors['avatar'])){
  echo $errors['avatar'] . "<br>";
}
?>

<label for="bio">Biographie</label>
<input id="bio" type="text" name="bio">
<br>
<?php
if(isset($errors['bio'])){
  echo $errors['bio'] . "<br>";
}
?>

<label for="checkCar">Check Car</label>
<input id="checkCar" type="text" name="checkCar">
<br>
<?php
if(isset($errors['checkCar'])){
  echo $errors['checkCar'] . "<br>";
}
?>

<label for="permmis">Permis</label>
<input id="permmis" type="text" name="permmis">
<br>
<?php
if(isset($errors['permis'])){
  echo $errors['permis'] . "<br>";
}
?>

<label for="dateBegin">Date Begin</label>
<input id="dateBegin" type="date" name="dateBegin">
<br>
<?php
if(isset($errors['dateBegin'])){
  echo $errors['dateBegin'] . "<br>";
}
?>

<label for="dateEnded">Date End</label>
<input id="dateEnded" type="date" name="dateEnded">
<br>
<?php
if(isset($errors['dateEnded'])){
  echo $errors['dateEnded'] . "<br>";
}
?>

<label for="title">Titre</label>
<input id="title" type="text" name="title">
<br>
<?php
if(isset($errors['title'])){
  echo $errors['title'] . "<br>";
}
?>

<label for="description">Description</label>
<input id="description" type="text" name="description">
<br>
<?php
if(isset($errors['description'])){
  echo $errors['description'] . "<br>";
}
?>
<input name="submit" type="submit">
</form>
